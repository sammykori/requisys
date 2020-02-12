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

Route::get('/dashboard', 'PagesController@index');
Route::get('/request/files', 'StaffsController@index');
Route::get('/record', 'PagesController@record');
Route::get('/water', 'PagesController@water');
Route::get('/vehicle', 'PagesController@vehicle');

Route::resource('records', 'RecordsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
