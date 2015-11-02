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
    Route::group(['prefix' => 'auth'], function() {
        Route::post('/login',             ['uses' => 'AuthController@authenticate']);
        Route::get('/getAuthUser',        ['uses' => 'AuthController@authUser', 'middleware' => 'jwt.auth']);
        Route::get('/logout',             ['uses' => 'AuthController@logout']);
        /*Route::post('/refresh',            'AuthController@refresh');
        */
    });
    Route::group(['prefix' => 'registred', 'middleware' => ['jwt.auth', 'acl']], function(){
        Route::get('/user',                    ['uses' => 'UserController@index']);
        Route::get('/user/{slug}',             ['uses' => 'UserController@show']);
        Route::get('/user/{slug}/level',       ['uses' => 'UserController@levels']);
        Route::get('/user/{slug}/adhesion',    ['uses' => 'UserController@adhesion']);
        Route::get('/user/{slug}/certificate', ['uses' => 'UserController@certificate']);
        Route::get('/user/{slug}/article',     ['uses' => 'UserController@articles']);
        Route::get('/user/{slug}/comment',     ['uses' => 'UserController@comments']);
        Route::get('/user/{slug}/dive',        ['uses' => 'UserController@diver']);
        Route::get('/user/{slug}/dive/owner',  ['uses' => 'UserController@diveOwner']);

        Route::get('/address',                 ['uses' => 'AddressController@index']);
        Route::get('/address/{id}',            ['uses' => 'AddressController@show']);

        Route::get('/article',                 ['uses' => 'ArticleController@index']);
        Route::get('/article/{slug}',          ['uses' => 'ArticleController@show']);
        Route::get('/article/{slug}/comment',  ['uses' => 'ArticleController@comments']);
        Route::get('/article/{slug}/user',     ['uses' => 'ArticleController@user']);

        Route::get('/level',                   ['uses' => 'LevelsController@index']);
        Route::get('/level/boat',              ['uses' => 'LevelsController@boat']);
        Route::get('/level/dive',              ['uses' => 'LevelsController@dive']);
        Route::get('/level/nitrox',            ['uses' => 'LevelsController@nitrox']);
        Route::get('/level/monitor',           ['uses' => 'LevelsController@monitor']);

        Route::get('/dive',                    ['uses' => 'DivesController@index']);
        Route::get('/dive/{slug}/user',        ['uses' => 'DivesController@registered']);

        Route::get('/adhesion/insurance',      ['uses' => 'AdhesionController@insurance']);
        Route::get('/adhesion/origin',         ['uses' => 'AdhesionController@origin']);
    });

    Route::group(['prefix' => 'admin', 'middelware' => ['jwt.auth', 'acl'], 'is' => 'admin'], function() {

    });
});


Route::get('/',                            'HomeController@bootstrap');
//Route::get('/foundation',                  'HomeController@foundation');

