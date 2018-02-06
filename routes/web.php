<?php

use App\Birthday;

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

Route::get('/', 'BirthdayController@index');

Route::prefix('/kalender')->group(function() {

	Route::get('/', 'BirthdayController@index');

	Route::get('/create', 'BirthdayController@create_view')->name('kalender.create');

	Route::post('/create', 'BirthdayController@create');

	Route::get('/delete/{id}', 'BirthdayController@delete');

	Route::get('/edit/{id}', 'BirthdayController@edit_view');

	Route::post('/edit/{id}', 'BirthdayController@edit');

});