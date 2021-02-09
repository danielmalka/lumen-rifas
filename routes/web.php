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

$router->get('/', [
    'as' => 'home', 'uses' => 'WebController@index'
]);
$router->get('/admin/rifa/nova', [
    'as' => 'rifa.create', 'uses' => 'RifaController@create'
]);
$router->post('/admin/rifa/criar', [
    'as' => 'rifa.insert', 'uses' => 'RifaController@insert'
]);
$router->post('/admin/rifa/atualizar', [
    'as' => 'rifa.update', 'uses' => 'RifaController@update'
]);
$router->get('/rifa/{id}', [
    'as' => 'rifa.index', 'uses' => 'RifaController@index'
]);
$router->get('/admin/rifa/edit/{id}', [
    'as' => 'rifa.edit', 'uses' => 'RifaController@edit'
]);
$router->get('/admin/rifa/{rifaId}/valores', [
    'as' => 'valores.index', 'uses' => 'ValoresController@index'
]);
$router->post('/admin/valores/criar', [
    'as' => 'valores.insert', 'uses' => 'ValoresController@insert'
]);
$router->get('/rifa/{rifaId}/{valorId}', [
    'as' => 'participante.create', 'uses' => 'ParticipanteController@create'
]);
$router->post('/rifa/participar', [
    'as' => 'participante.insert', 'uses' => 'ParticipanteController@insert'
]);
