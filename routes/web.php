<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group([
    'prefix' => 'api/v1',
], function () use ($router) {
    $router->get('/users', 'UsersController@index');
    $router->get('/users/{id}', 'UsersController@show');
    $router->post('/users', 'UsersController@store');
    $router->patch('/users/{id}', 'UsersController@update');
    $router->delete('/users/{id}', 'UsersController@destroy');

    //bonus points, and two other "bonus" endpoints
    $router->post('/users/optout/{id}', 'UsersController@optout');
    $router->get('/users/optedin', 'UsersController@optedin');
    $router->get('/users/optedout', 'UsersController@optedout');
});

