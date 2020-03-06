<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/login', function (Request $request) {
    return response()->json([
        'message' => 'Cree sus credenciales de acceso.'
    ], 201);
})->name('login');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('logout', 'AuthController@logout')->middleware('auth:api');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'sedes-olimpicas'], function () {
        Route::get('/', 'API\OlympicHeadquarterController@index');
        Route::post('/', 'API\OlympicHeadquarterController@store');
        Route::get('/{id}', 'API\OlympicHeadquarterController@show');
        Route::put('/{id}', 'API\OlympicHeadquarterController@update');
        Route::delete('/{id}', 'API\OlympicHeadquarterController@destroy');
    });
    Route::group(['prefix' => 'complejos-deportivos'], function () {
        Route::get('/', 'API\SportComplexController@index');
        Route::post('/', 'API\SportComplexController@store');
        Route::get('/{id}', 'API\SportComplexController@show');
        Route::put('/{id}', 'API\SportComplexController@update');
        Route::delete('/{id}', 'API\SportComplexController@destroy');
    });
    Route::group(['prefix' => 'complejos-deporte-unico'], function () {
        Route::get('/', 'API\UniqueSportComplexController@index');
        Route::get('/{id}', 'API\UniqueSportComplexController@show');
    });
    Route::group(['prefix' => 'complejos-polideportivos'], function () {
        Route::get('/', 'API\SportsCenterComplexController@index');
        Route::get('/{id}', 'API\SportsCenterComplexController@show');
    });
    Route::group(['prefix' => 'areas-complejos-polideportivos'], function () {
        Route::get('/', 'API\AreaController@index');
        Route::get('/{id}', 'API\AreaController@show');
    });
    Route::group(['prefix' => 'eventos'], function () {
        Route::get('/', 'API\EventController@index');
        Route::post('/', 'API\EventController@store');
        Route::get('/{id}', 'API\EventController@show');
        Route::put('/{id}', 'API\EventController@update');
        Route::delete('/{id}', 'API\EventController@destroy');
    });
    Route::group(['prefix' => 'comisionados'], function () {
        Route::get('/', 'API\CommissarController@index');
        Route::post('/', 'API\CommissarController@store');
        Route::get('/{id}', 'API\CommissarController@show');
        Route::put('/{id}', 'API\CommissarController@update');
        Route::delete('/{id}', 'API\CommissarController@destroy');
    });
    Route::group(['prefix' => 'equipamientos'], function () {
        Route::get('/', 'API\EquipmentController@index');
        Route::post('/', 'API\EquipmentController@store');
        Route::get('/{id}', 'API\EquipmentController@show');
        Route::put('/{id}', 'API\EquipmentController@update');
        Route::delete('/{id}', 'API\EquipmentController@destroy');
    });
});
