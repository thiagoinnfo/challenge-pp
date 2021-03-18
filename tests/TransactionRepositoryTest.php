<?php

use App\Repositories\TransactionRepository;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Transaction;

/**
 * Class TransactionRepositoryTest
 */
class TransactionRepositoryTest extends TestCase
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
        $this->repository = new TransactionRepository(new Transaction());
        parent::setUp();
    }

    /**
     * Test save transaction
     * @test
     */
    public function testSave()
    {
        $transaction = $this->repository->save([
            'payer' => 1,
            'payee' => 2,
            'value' => 500
        ]);

        $this->assertEquals(1, $transaction->payer);
        $this->assertEquals(2, $transaction->payee);
        $this->assertEquals(500, $transaction->value);
    }

}
