<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/


Route::get('/user',                  'UserController@index');
Route::get('/user/{slug}',             'UserController@show');
Route::get('/user/{id}/level',       'UserController@levels');
Route::get('/user/{id}/adhesion',    'UserController@adhesion');
Route::get('/user/{id}/certificate', 'UserController@certificate');
Route::get('/user/{id}/article',     'UserController@articles');
Route::get('/user/{id}/comment',     'UserController@comments');
Route::get('/user/{id}/dive',        'UserController@diver');
Route::get('/user/{id}/dive/owner',  'UserController@diveOwner');

Route::get('/address',               'AddressController@index');