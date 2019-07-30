<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * /products [GET]
     */
    public function testShouldReturnAllProducts(){
        $this->get("products", []);
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

    /**
     * /product/id [GET]
     */
    public function testShouldReturnProduct(){
        $this->get("product/1", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                    'id',
                    'sku',
                    'name',
                    'price',
                    'description',
                    'created_at',
                    'updated_at'
        ]);
        
    }
    /**
     * /product [POST]
     */
    public function testShouldCreateProduct(){
        $parameters = [
            'sku' => 'iPhone-X-128GB',
            'name' => 'iPhone X 128GB Mobile Phone',
            'price' => '500',
            'description' => 'iPhone X 128GB Mobile Phone'
        ];
        $this->post("product", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'id',
            'sku',
            'name',
            'price',
            'description',
            'created_at',
            'updated_at'
        ]);
        
    }
    
    /**
     * /product/id [PUT]
     */
    public function testShouldUpdateProduct(){
        $parameters = [
            'sku' => 'iPhone-X-256GB',
            'name' => 'iPhone X 256GB Mobile Phone',
            'price' => '800',
            'description' => 'iPhone X 256GB Mobile Phone'
        ];
        $this->put("product/19", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'id',
            'sku',
            'name',
            'price',
            'description',
            'created_at',
            'updated_at'
        ]);
    }
}