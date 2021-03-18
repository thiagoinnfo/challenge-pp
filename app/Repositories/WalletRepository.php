<?php


namespace App\Repositories;

use App\Models\Wallet;

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
     * Update attribute amount on database
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $wallet = $this->wallet
            ->where('user_id', $id)
            ->first();

        $wallet->amount = $data['amount'];

        return $wallet->update();
    }

}