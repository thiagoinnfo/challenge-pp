<?php

use App\Repositories\TransactionRepository;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Repositories\WalletRepository;
use App\Models\Wallet;

/**
 * Class WalletRepositoryTest
 */
class WalletRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var TransactionRepository
     */
    protected $repository;

    /**
     * Method setUp
     */
    public function setUp(): void
    {
        $this->repository = new WalletRepository(new Wallet());
        parent::setUp();
    }

    /**
     * Test get wallet by user id
     * @test
     */
    public function testGetWalletByUserId()
    {
        $wallet = $this->repository->getWalletByUserId(1);
        $this->assertArrayHasKey('user_id', $wallet);
        $this->assertArrayHasKey('amount', $wallet);
    }

    /**
     * Test method update
     * @test
     */
    public function testUpdate()
    {
        $wallet = $this->repository->update(['amount' => 100], 1);
        $this->assertTrue(true, $wallet);
    }
}
