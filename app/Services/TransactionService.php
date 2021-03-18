<?php

namespace App\Services;

use App\Repositories\NotificationRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\WalletRepository;
use App\Libraries\Authorization\AuthorizationStrategy;
use App\Libraries\Authorization\MockyAuthorization;
use App\Libraries\Notification\MockyNotification;
use App\Libraries\Notification\NotificationStrategy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Exception;

/**
 * Class TransactionService
 * @package App\Services
 */
class TransactionService{


    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * @var WalletRepository
     */
    private $walletRepository;

    /**
     * @var NotificationRepository
     */
    private $notificationRepository;

    /**
     * TransactionService constructor.
     * @param TransactionRepository $transactionRepository
     * @param WalletRepository $walletRepository
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(TransactionRepository $transactionRepository,
        WalletRepository $walletRepository, NotificationRepository $notificationRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->walletRepository = $walletRepository;
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Transfere valores entre contas
     * @param array $data
     * @throws Exception
     */
    public function transfer(array $data): void
    {

        $validator = Validator::make($data, [
            'value' => 'required|numeric|min:0|not_in:0',
            'payer' => 'required|integer|exists:users,id,status,1',
            'payee' => 'required|integer|exists:users,id,status,1'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try{

            $payer = $this->walletRepository->getWalletByUserId($data['payer']);

            if($payer->amount < $data['value']){
                throw new Exception("Account balance is insufficient");
            }

            $authorization = new AuthorizationStrategy(new MockyAuthorization);
            $authorize = $authorization->execute();

            if(!$authorize){
                throw new Exception("Unauthorized service");
            }

            $this->walletRepository->update([
                'amount' => $payer->amount - $data['value']
            ], $data['payer']);

            $payee = $this->walletRepository->getWalletByUserId($data['payee']);

            $this->walletRepository->update([
                'amount' => $payee->amount + $data['value']
            ], $data['payee']);

            $transaction = $this->transactionRepository->save($data);

            DB::commit();

            $notification = new NotificationStrategy(new MockyNotification);
            $notify = $notification->execute();

            $this->notificationRepository->save([
                'transaction_id' => $transaction->id,
                'status' => ($notify ? 1 : 0)
            ]);

        }catch(Exception $ex){
            DB::rollBack();
            throw new Exception($ex->getMessage());
        }
    }
}