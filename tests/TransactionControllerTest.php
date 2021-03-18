<?php

use App\Repositories\TransactionRepository;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Class TransactionControllerTest
 */
class TransactionControllerTest extends TestCase
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
        parent::setUp();
    }

    /**
     * Test Transaction Controller
     * @test
     */
    public function testTransfer()
    {
        $data = [
            'payer' => 1,
            'payee' => 2,
            'value' => 1
        ];
        $this->json('POST', '/transaction', $data)
            ->seeJsonEquals([
                'status' => 200,
            ]);
    }
}
