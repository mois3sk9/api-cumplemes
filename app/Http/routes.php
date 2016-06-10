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
    return $app->version();
});

//SITIOS

$app->get('sitios', [
	'middleware' => 'auth',
	'uses' => 'SitiosController@index'
]);
$app->post('sitios/store', [
	'middleware' => 'auth',
	'uses' => 'SitiosController@store'
]);
$app->delete('sitios/remove', [
	'middleware' => 'auth',
	'uses' => 'SitiosController@remove'
]);
$app->post('sitios/update', [
	'middleware' => 'auth',
	'uses' => 'SitiosController@update'
]);


//RECOMENDACIONES 

$app->get('recomendations', [
	'middleware' => 'auth',
	'uses' => 'RecomendationsController@index'
]);
$app->post('recomendations/store', [
	'middleware' => 'auth',
	'uses' => 'RecomendationsController@store'
]);
$app->delete('recomendations/remove', [
	'middleware' => 'auth',
	'uses' => 'RecomendationsController@remove'
]);
$app->get('recomendations/update', [
	'middleware' => 'auth',
	'uses' => 'RecomendationsController@update'
]);

//RECORDATORIO 

$app->get('recordatories', [
	'middleware' => 'auth',
	'uses' => 'RecordatoriesController@index'
]);
$app->post('recordatories/store', [
	'middleware' => 'auth',
	'uses' => 'RecordatoriesController@store'
]);
$app->delete('recordatories/remove', [
	'middleware' => 'auth',
	'uses' => 'RecordatoriesController@remove'
]);
$app->post('recordatories/update', [
	'middleware' => 'auth',
	'uses' => 'RecordatoriesController@update'
]);
