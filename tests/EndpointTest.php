<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class EndpointTest extends TestCase
{
    public function test_thatListUsersEndPointReturnSuccess()
    {
        $this->get('/api/user');

        $this->assertNotNull($this->response->decodeResponseJson());
        $this->response->assertSuccessful();
    }
}
