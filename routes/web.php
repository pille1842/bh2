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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::middleware('can:manage,App\Client')->group(function () {
        Route::get('/client', 'ClientController@index');
        Route::post('/client', 'ClientController@store');
        Route::get('/client/{client}', 'ClientController@show');
        Route::delete('/client/{client}', 'ClientController@destroy')
            ->middleware('can:delete,client');
        Route::get('/client/{client}/edit', 'ClientController@edit');
        Route::post('/client/{client}', 'ClientController@update');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
