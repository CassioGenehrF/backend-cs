<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UserCompanyController;

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

$router->options('/{any:.*}', [
        'middleware' => ['cors'], function () { 
            return response(['status' => 'success']); 
        }
    ]
);

$router->group(['prefix' => 'api', 'middleware' => 'cors'], function () use ($router) {
    $router->group(['prefix' => 'user'], function () use ($router) {
        $router->post('', 'UserController@store');
        $router->get('', 'UserController@index');
        $router->get('{id}', 'UserController@show');
        $router->put('{id}', 'UserController@update');
        $router->delete('{id}', 'UserController@destroy');

        $router->get('{id}/companies', 'UserCompanyController@companiesByUser');
    });

    $router->group(['prefix' => 'company'], function () use ($router) {
        $router->post('', 'CompanyController@store');
        $router->get('', 'CompanyController@index');
        $router->get('{id}', 'CompanyController@show');
        $router->put('{id}', 'CompanyController@update');
        $router->delete('{id}', 'CompanyController@destroy');
        
        $router->post('/users', 'UserCompanyController@store');
        $router->get('{id}/users', 'UserCompanyController@usersByCompany');
        $router->delete('{companyId}/user/{userId}', 'UserCompanyController@deleteUser');
    });
});