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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::group(['prefix'=>'users'], function () {
        Route::get('/', 'UserController@index')->name('admin.users.index');

        Route::get('edit/{id?}', 'UserController@edit')->name('admin.users.edit');
        Route::post('edit/{id?}', 'UserController@update')->name('admin.users.update');

        Route::get('delete/{id}', 'UserController@delete')->name('admin.users.delete');
    });

    Route::resource('categories', 'CategoryController');
});