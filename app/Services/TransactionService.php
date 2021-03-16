<?php

namespace App\Services;

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
     * TransactionService constructor.
     * @param TransactionRepository $transactionRepository
     * @param WalletRepository $walletRepository
     */
    public function __construct(TransactionRepository $transactionRepository,
        WalletRepository $walletRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->walletRepository = $walletRepository;
    }

    /**
     * Transfere valores entre contas
     * @param array $data
     * @throws Exception
     */
    public function transfer(array $data): void
    {
        DB::beginTransaction();

        try{

            $this->validatorTransaction($data);
            $this->checkAccountBalance($data['payer'], $data['value']);
            $this->authorization();
            $this->transaction($data);
            $this->debit($data['payer'], $data['value']);
            $this->credit($data['payee'], $data['value']);

            DB::commit();

            $this->notification();

        }catch(Exception $ex){
            DB::rollBack();
            throw new Exception($ex->getMessage());
        }
    }

    /**
     * Enviar notificação para o cliente
     */
    public function notification()
    {
        $notification = new NotificationStrategy(new MockyNotification);
        $notify = $notification->execute();

        if(!$notify || (!isset($notify['message']) || $notify['message'] != 'Autorizado')){
            //salvar na tabela de reprocessamento
        }
    }

    /**
     * Validar input transação
     * @param array $data
     */
    public function validatorTransaction(array $data)
    {

        $validator = Validator::make($data, [
            'value' => 'required|numeric|min:0|not_in:0',
            'payer' => 'required|integer|exists:users,id,status,1',
            'payee' => 'required|integer|exists:users,id,status,1'
        ], [
            'value.required' => 'O atributo value é obrigatório',
            'value.numeric'  => 'O atributo value é inválido',
            'value.not_in'   => 'O atributo value precisa ser maior que 0',
            'payer.required' => 'O atributo payer é obrigatório',
            'payer.integer'  => 'O atributo payer é inválido',
            'payer.exists'   => 'O atributo payer não existe',
            'payee.required' => 'O atributo payee é obrigatório',
            'payee.integer'  => 'O atributo payee é inválido',
            'payee.exists'   => 'O atributo payee não existe',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
    }

    /**
     * Verifica se existe saldo suficiente em conta
     * @param int $payer
     * @param $value
     * @throws Exception
     */
    public function checkAccountBalance(int $payer, $value)
    {
        $wallet = $this->walletRepository->getWalletByUserId($payer);

        if(!$wallet){
            throw new Exception("Conta do pagador não encontrada.");
        }

        if($wallet->amount < $value){
            throw new Exception("O saldo da conta é insuficiente.");
        }
    }

    /**
     * Salvar transação
     * @param array $array
     * @throws Exception
     */
    public function transaction(array $array)
    {
        if(!$this->transactionRepository->save($array)){
            throw new Exception("Erro ao salvar a transação");
        }
    }

    /**
     * Debitar valor da carteira do pagador
     * @param int $payer
     * @param $value
     * @throws Exception
     */
    public function debit(int $payer, $value)
    {
        if(!$this->walletRepository->debit($payer, $value)){
            throw new Exception("Erro ao debitar valor.");
        }
    }

    /**
     * Creditar valor na conta do beneficiario
     * @param int $payer
     * @param $value
     * @throws Exception
     */
    public function credit(int $payer, $value)
    {
        if(!$this->walletRepository->credit($payer, $value)){
            throw new Exception("Erro ao creditar valor.");
        }
    }

    /**
     * Autorizar transação
     * @throws Exception
     */
    public function authorization()
    {
        $authorization = new AuthorizationStrategy(new MockyAuthorization);
        $authorize = $authorization->execute();

        if(!$authorize){
            throw new Exception("Serviço de autorização está inoperante.");
        }

        if(!isset($authorize['message']) || $authorize['message'] != 'Autorizado'){
            throw new Exception("Operação não permitida pelo serviço autorizador.");
        }
    }
}