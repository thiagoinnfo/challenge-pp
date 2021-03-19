<?php

use App\Libraries\Notification\MockyNotification;

/**
 * Class MockyNotificationTest
 */
class MockyNotificationTest extends TestCase
{

    /**
     * @var MockyNotification
     */
    private $mockyNotification;

    /**
     * Method setUp
     */
    public function setUp(): void
    {
        $this->mockyNotification = new MockyNotification();
        parent::setUp();
    }

    /**
     * Test method execute
     * @test
     */
    public function testExecute()
    {
        $notification = $this->mockyNotification->execute();
        $this->assertEquals(true, $notification['status']);
        $this->assertEquals('Enviado', $notification['message']);
    }
}
