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
    return $app->welcome();
});

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
]);
$app->get('user/{id}', ['uses' => 'UserController@Index']);

$app->get('account/login/user_name/{user_name}/user_pwd/{user_pwd}', ['uses' => 'AccountController@Login']);

$app->get('mockserver/{id}', ['uses' => 'MockController@Index']);