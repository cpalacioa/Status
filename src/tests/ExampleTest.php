<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSaveStatusMessage()
    {
        $this->json('POST', '/api/v1/status', ['status' => 'Mensaje de prueba']);
    }
    public function testGetStatusMessageById()
    {
        $this->json('POST', '/api/v1/status/1');
    }
    public function testGetStatusMessageByString()
    {
        $this->json('POST', '/api/v1/status/mensaje');
    }
    public function testDeleteStatusMessageById()
    {
        $this->json('Delete', '/api/v1/status/1');
    }

}
