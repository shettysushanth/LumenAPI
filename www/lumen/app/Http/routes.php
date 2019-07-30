<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->app->version();
});

// Login & Register routes
// ----------------------------------------------------
$app->post('/login', 'LoginController@login');

$app->post('/register', 'UserController@register');


// User routes
// -----------------------------------------------------------------------------------------
$app->get('/user', ['middleware' => 'auth', 'uses' =>  'UserController@get_current_user']);

$app->get('/users', ['middleware' => 'auth', 'uses' =>  'UserController@get_users']);

// Product routes
// ----------------------------------------------------------------------------------------
$app->get('/products', 'ProductController@index');

$app->post('/product', 'ProductController@create');

$app->get('/product/{id}', 'ProductController@show');

$app->put('/product/{id}', 'ProductController@update');

$app->delete('/product/{id}', 'ProductController@delete');

// User Products routes
// ---------------------------------------------------------------------------------------------
$app->get('/user/products', ['middleware' => 'auth', 'uses' =>  'UsersProductsController@index']);

$app->post('/user/products', ['middleware' => 'auth', 'uses' =>  'UsersProductsController@add']);

$app->get('/user/products/suggestions', ['middleware' => 'auth', 'uses' =>  'UsersProductsController@suggestions']);