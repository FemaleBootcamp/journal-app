<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/', 'StaticController@home')->name('home');

Route::get('dashboard', 'StaticController@dashboard')->name('dashboard')->middleware('auth');

Route::get('/about-us', 'StaticController@team')->name('team');

Route::get('/stats', 'StaticController@stats')->name('stats');