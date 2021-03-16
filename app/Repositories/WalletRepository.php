<?php


namespace App\Repositories;

use App\Models\Wallet;
use Exception;
use UnexpectedValueException;

/**
 * Class WalletRepository
 * @package App\Repositories
 */
class WalletRepository
{
    /**
     * Property model wallet
     * @var
     */
    private $wallet;

    /**
     * WalletRepository constructor.
     * @param Wallet $wallet
     */
    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    /**
     * Get wallet by userid
     * @param int $id
     * @return mixed
     */
    public function getWalletByUserId(int $id)
    {
        return $this->wallet
            ->where('user_id', $id)
            ->first();
    }

    /**
     * Method debit
     * @param int $id
     * @param $value
     * @return mixed
     * @throws Exception
     */
    public function debit(int $id, $value)
    {
        $wallet = $this->wallet
            ->where('user_id', $id)
            ->first();

        $wallet->amount = $wallet->amount - $value;

        return $wallet->update();
    }

    /**
     * Method credit
     * @param int $id
     * @param $value
     * @return mixed
     * @throws Exception
     */
    public function credit(int $id, $value)
    {
        $wallet = $this->wallet
            ->where('user_id', $id)
            ->first();

        $wallet->amount = $wallet->amount + $value;
        
        return $wallet->update();
    }

}