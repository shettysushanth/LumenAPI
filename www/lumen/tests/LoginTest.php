<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * /login [POST]
     */
    public function testShouldDoLogin(){
        $parameters = [
            'email' => 'mac94@moen.com',
            'password' => '123456'
        ];
        $this->post("login", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                'status','message', 'data'
        ]);
        
    }
}