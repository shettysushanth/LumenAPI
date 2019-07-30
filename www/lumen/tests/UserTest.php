<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * /user [GET]
     */
    public function testShouldReturnAllUsers(){
        $this->get("user", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            '*' => [
                    'id',
                    'sku',
                    'name',
                    'price',
                    'description',
                    'created_at',
                    'updated_at'
                ]
        ]);
        
    }
}