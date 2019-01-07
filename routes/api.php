<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('journals', 'API\JournalController@store');

Route::get('/journals', 'API\JournalController@get');
Route::get('/journals/{id}', 'API\JournalController@show');
Route::delete('/journals/{id}', 'API\JournalController@destroy');
//Route::put('/journals/{id}', 'API\JournalController@update');