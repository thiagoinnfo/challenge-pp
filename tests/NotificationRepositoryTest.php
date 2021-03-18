<?php

use App\Repositories\NotificationRepository;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Notification;

/**
 * Class NotificationRepositoryTest
 */
class NotificationRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var NotificationRepository
     */
    protected $repository;

    /**
     * Method setUp
     */
    public function setUp(): void
    {
        $this->repository = new NotificationRepository(new Notification());
        parent::setUp();
    }

    /**
     * Test save
     * @test
     */
    public function testSave()
    {
        $notification = $this->repository->save([
            'transaction_id' => 1,
            'status' => 1
        ]);

        $this->assertTrue(true, $notification);
    }
}
