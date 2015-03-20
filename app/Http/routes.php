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


Route::get('/user',                    'UserController@index');
Route::get('/user/{slug}',             'UserController@show');
Route::get('/user/{slug}/level',       'UserController@levels');
Route::get('/user/{slug}/adhesion',    'UserController@adhesion');
Route::get('/user/{slug}/certificate', 'UserController@certificate');
Route::get('/user/{slug}/article',     'UserController@articles');
Route::get('/user/{slug}/comment',     'UserController@comments');
Route::get('/user/{slug}/dive',        'UserController@diver');
Route::get('/user/{slug}/dive/owner',  'UserController@diveOwner');

Route::get('/address',                 'AddressController@index');