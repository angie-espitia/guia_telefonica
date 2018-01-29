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

Route::group(['prefix' => 'admin'], function()
{
	Route::get('/', 'AdminController@excel')->middleware('auth');
	Route::get('/subido', 'AdminController@subido')->middleware('auth');

	Route::post('/guardarArchivo', 'AdminController@guardarArchivo')->middleware('auth');
	Route::get('/crear', 'AdminController@crear')->middleware('auth');
	Route::post('/subirRespuestas', 'AdminController@subirRespuestas')->middleware('auth');
});

Route::group(['prefix' => '/'], function()
{
	Route::get('/', 'UserController@index')->middleware('auth');
	Route::get('/mostrar', 'UserController@mostrar')->middleware('auth');
	Route::post('/buscar', 'UserController@buscar')->middleware('auth');
});
