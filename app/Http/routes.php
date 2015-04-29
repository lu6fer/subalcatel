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
Route::group(['prefix' => 'api'], function(){
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
    Route::get('/address/{id}',            'AddressController@show');

    Route::get('/article',                 'ArticleController@index');
    Route::get('/article/{slug}',          'ArticleController@show');
    Route::get('/article/{slug}/comment',  'ArticleController@comments');
    Route::get('/article/{slug}/user',     'ArticleController@user');

    Route::get('/level',                   'LevelsController@index');
    Route::get('/level/boat',              'LevelsController@boat');
    Route::get('/level/dive',              'LevelsController@dive');
    Route::get('/level/nitrox',            'LevelsController@nitrox');
    Route::get('/level/monitor',           'LevelsController@monitor');

    Route::get('/dive',                    'DivesController@index');
    Route::get('/dive/{slug}/user',        'DivesController@registered');

    Route::get('/adhesion/insurance',      'AdhesionController@insurance');
    Route::get('/adhesion/origin',         'AdhesionController@origin');
});

Route::get('/',                            'HomeController@bootstrap');
//Route::get('/foundation',                  'HomeController@foundation');

