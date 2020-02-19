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



Route::get('/record', 'PagesController@record');
Route::get('/water', 'PagesController@water');
Route::get('/vehicle', 'PagesController@vehicle');
Route::get('/pending', 'PagesController@pending');

Route::get('/request/files', 'RecordsController@index');

Route::resource('records', 'RecordsController');

Route::post('/updaterecords','RecordsController@update');


Auth::routes();

Route::get('/', 'DashboardController@index');

Route::prefix('admin')->group(function(){
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit'); 
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login'); 
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});