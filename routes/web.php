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

Route::get('login', 'Auth\LoginController@getLogin')->name('client.getLogin');
Route::post('login', 'Auth\LoginController@postLogin')->name('client.postLogin');

Route::group(['namespace' => 'Client'], function () {
    Route::get('/', 'HomeController@home')->name('home');

    Route::get('categories/{category_id}', 'CategoryController@getCategories')->name('client.categories');

    Route::get('tests/{category_id}', 'CategoryController@getTests')->name('client.tests');

    Route::get('guide-test/{test_id}', 'TestController@getGuideTest')->name('client.test.guide');

    Route::get('test/{test_id}', 'TestController@getTest')->name('client.test.get');
    Route::post('test/{test_id}', 'TestController@postTest')->name('client.test.post');

    Route::get('ranking', 'RankingController@getRanking')->name('client.ranking');

    Route::get('histories', 'HistoryController@getHistories')->name('client.histories');

    Route::get('history/{history_id}', 'HistoryController@getHistory')->name('client.history');
});
