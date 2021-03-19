<?php

use App\Libraries\Authorization\MockyAuthorization;

/**
 * Class MockyAuthorizationTest
 */
class MockyAuthorizationTest extends TestCase
{

    /**
     * @var MockyAuthorization
     */
    private $mockyAuthorization;

    /**
     * Method setUp
     */
    public function setUp(): void
    {
        $this->mockyAuthorization = new MockyAuthorization();
        parent::setUp();
    }

    /**
     * Test method execute
     * @test
     */
    public function testExecute()
    {
        $authorization = $this->mockyAuthorization->execute();
        $this->assertEquals(true, $authorization['status']);
        $this->assertEquals('Autorizado', $authorization['message']);
    }
}
