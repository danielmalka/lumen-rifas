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
$router->group(['prefix' => 'rifa'], function () use ($router) {
    $router->get('/{id}', [
        'as' => 'rifa.index', 'uses' => 'RifaController@index'
    ]);
    $router->get('/{rifaId}/{valorId}', [
        'as' => 'participante.create', 'uses' => 'ParticipanteController@create'
    ]);
    $router->post('/participar', [
        'as' => 'participante.insert', 'uses' => 'ParticipanteController@insert'
    ]);
});

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->group(['prefix' => 'rifa'], function () use ($router) {
        $router->get('/nova', [
            'as' => 'rifa.create', 'uses' => 'RifaController@create'
        ]);
        $router->post('/criar', [
            'as' => 'rifa.insert', 'uses' => 'RifaController@insert'
        ]);
        $router->post('/atualizar', [
            'as' => 'rifa.update', 'uses' => 'RifaController@update'
        ]);
        $router->get('/edit/{id}', [
            'as' => 'rifa.edit', 'uses' => 'RifaController@edit'
        ]);
        $router->get('/{rifaId}/valores', [
            'as' => 'valores.index', 'uses' => 'ValoresController@index'
        ]);
    });
    $router->group(['prefix' => 'participante'], function () use ($router) {
        $router->get('/{participanteId}/remover', [
            'as' => 'participante.delete', 'uses' => 'ParticipanteController@delete'
        ]);
        $router->get('/{rifaId}/listar', [
            'as' => 'participante.show', 'uses' => 'ParticipanteController@show'
        ]);
        $router->get('/{participanteId}/status/{estado}', [
            'as' => 'participante.status', 'uses' => 'ParticipanteController@status'
        ]);
    });
    $router->post('/valores/criar', [
        'as' => 'valores.insert', 'uses' => 'ValoresController@insert'
    ]);
});
