<?php

namespace App\Services;

use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
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
 */
class TransactionService{


    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var WalletRepository
     */
    private $walletRepository;

    /**
     * TransactionService constructor.
     * @param TransactionRepository $transactionRepository
     * @param UserRepository $userRepository
     * @param WalletRepository $walletRepository
     */
    public function __construct(TransactionRepository $transactionRepository,
    UserRepository $userRepository, WalletRepository $walletRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
        $this->walletRepository = $walletRepository;
    }

    /**
     * Method Transfer
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function transfer(array $data): array
    {
        DB::beginTransaction();

        try{
            /**

            $authorizationStrategy = new AuthorizationStrategy(new MockyAuthorization());
            $authorization = $authorizationStrategy->execute();

            if(!$authorization){
                throw new Exception("Serviço autorizador não disponível.");
            }

            $walletPayer = $this->walletRepository->getWalletByUserId($data['payer']);

            if($walletPayer->amount < $data['value']){
                throw new Exception("O saldo do pagador é insuficiente.");   
            }

            $transaction = $this->transactionRepository->save($data);

            $walletDebit = $this->walletRepository->debit($data['payer'], $data['value']);
            $walletCredit = $this->walletRepository->credit($data['payee'], $data['value']);

            $notificationStrategy = new NotificationStrategy(new MockyNotification);
            $notificationStrategy->execute();

            DB::commit();
            **/
        }catch(Exception $ex){
            DB::rollBack();
            throw new InvalidArgumentException($ex->getMessage());
        }

        $result['data'] = [];

        return $result;

    }

}