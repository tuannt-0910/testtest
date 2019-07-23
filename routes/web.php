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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::group(['prefix'=>'users'], function () {
        Route::get('/', 'UserController@index')->name('admin.users.index');

        Route::get('{id}/edit', 'UserController@edit')->name('admin.users.edit');
    });
});