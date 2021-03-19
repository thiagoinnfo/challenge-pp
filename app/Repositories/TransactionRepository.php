<?php

namespace App\Repositories;

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