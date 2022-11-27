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

$router->group(['prefix' => 'auth'], function () use ($router) {
  $router->post('/register', ['uses' => 'AuthController@register']);
  $router->post('/login', ['uses' => 'AuthController@login']);
  $router->get('/me', ['middleware' => 'jwt.auth', 'uses' => 'AuthController@me']); //
});

$router->group(['prefix' => 'mata-kuliah'], function () use ($router) {
  $router->post('/', ['uses' => 'MataKuliahController@createMataKuliah']);
});

$router->group(['prefix' => 'mahasiswa'], function () use ($router) {
  $router->post('/matkul/{mkId}', ['middleware' => 'jwt.auth','uses' => 'MahasiswaController@addMataKuliah']);
});