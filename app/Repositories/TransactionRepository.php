<?php

namespace App\Repositories;

use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;

/**
 * Class TransactionRepository
 * @package App\Repositories
 */
class TransactionRepository
{
    /**
     * @var Transaction
     */
    private $transaction;

    /**
     * @var string[]
     */
    private $messages = [
        'value.required' => 'O valor é obrigatório',
        'value.numeric'  => 'O valor é inválido',
        'value.not_in'   => 'O valor precisa ser maior que 0',
        'payer.required' => 'O pagador é obrigatório',
        'payer.integer'  => 'O pagador é inválido',
        'payer.exists'   => 'O pagador não existe',
        'payee.required' => 'O beneficiário é obrigatório',
        'payee.integer'  => 'O beneficiário é inválido',
        'payee.exists'   => 'O beneficiário não existe',
    ];

    /**
     * TransactionRepository constructor.
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Salvar transação
     * @param array $data
     * @return mixed
     */
    public function save(array $data)
    {
        $transaction = new $this->transaction;

        $transaction->payer = $data['payer'];
        $transaction->payee = $data['payee'];
        $transaction->value = $data['value'];

        $transaction->save();

        return $transaction->refresh();
    }

}