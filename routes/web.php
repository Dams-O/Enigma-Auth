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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
    // Route d enregistrement "/api/register
    $router->post('register', 'AuthController@register');

     // Route d authentification "/api/login
    $router->post('login', 'AuthController@login');

    // Route qui retourne profil "/api/profile
    $router->get('profile', 'UserController@profile');

    // Retourne un utilisateur par id "/api/users/1 
    $router->get('users/{id}', 'UserController@singleUser');
    
    // Retourne toute la liste des utilisateurs "/api/users
    $router->get('users', 'UserController@allUsers');
});