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

/** Generete keys */
$router->get('/key', function () use ($router) {
    return str_random(32);
});

/** Authenticate */
$router->post('/auth/login', 'AuthController@login');

/** Register user */
$router->post('/createuser','UserController@create');

/** Register new Client */
$router->post('/createclient','ClientController@create');

/** Register new Pet */
$router->post('/createpet','PetController@create');

/** Get Pets by client */
$router->get('/getpetsbyclient/{cod_client}','PetController@getByClient');

/** Create Assigment */
$router->post('/createassign','AssignController@create');

/** Get service by cod city */
$router->get('/getservicesbycity/{cod_city}','ServiceController@getServicesByCity');

/** Get services by cod vet */
$router->get('/getservicesbyvet/{cod_vet}','ServiceController@getServicesByVet');

/** Get vet by city */
$router->get('/getvetsbycity/{cod_city}','VetController@getVetsByCity');

/** Get All cities */
$router->get('/getcities','CityController@getAll');

/** Protected routes */
$router->group(['middleware' => 'auth:api'], function($router)
{
    /*********************************************************
     * GETTERS
     */
    $router->get('/getsession','AuthController@getSession');
    $router->get('/getuserbyid/{id}','UserController@getUserById');    

    /*********************************************************
     * POSTS
     */
    $router->post('/createtservice','ServiceController@createT');
    $router->post('/createcity','CityController@create');
    $router->post('/createvet','VetController@create');
    $router->post('/createservice','ServiceController@create');

    /*********************************************************
    * PUTS
    */
    $router->put('/modifystateassign/{cod_assign}','AssignController@modifyState');

});

/** Presentation */
$router->get('/', function () use ($router)
{
    $html='
    <DOCTYPE html>
    <html>
    <head>
    <title>VSA API</title>
    </head>
    <body>
    '.$router->app->version().'
    </body>
    </html>
    ';
    return $html;
});
