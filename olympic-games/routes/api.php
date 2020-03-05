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
    });
});
