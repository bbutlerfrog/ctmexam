<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('api/v1/users')

        ->seeStatusCode(200)
        ->seeJsonStructure([
            '*' => [
                'id',
                'email',
                'optin',
                'firstname',
                'lastname',
                'created_at',
                'updated_at',
            ]
        ]);
    }
    
}
