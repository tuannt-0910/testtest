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

Route::get('redirect/{social}', 'SocialAuthController@redirect')->name('loginFacebook');
Route::get('callback/{social}', 'SocialAuthController@callback');

Route::get('login', 'Auth\LoginController@getLoginClient')->name('client.getLogin');
Route::post('login', 'Auth\LoginController@loginClient')->name('client.postLogin');

Route::group(['namespace' => 'Client'], function () {
    Route::get('/', 'HomeController@home')->name('home');

    Route::get('categories/{category_id}', 'CategoryController@getCategories')->name('client.categories');

    Route::get('tests/{category_id}', 'CategoryController@getTests')->name('client.tests');

    Route::group(['middleware' => 'checkUserViewTest'], function () {
        Route::get('guide-test/{test_id}', 'TestController@getGuideTest')->name('client.test.guide');

        Route::get('test/{test_id}', 'TestController@getTest')->name('client.test.get');
        Route::post('test/{test_id}', 'TestController@postTest')->name('client.test.post');
    });

    Route::get('result/{test_id}', 'TestController@getResult')->middleware('checkViewTestResult')
        ->name('client.test.getResult');

    Route::get('ranking', 'RankingController@getRanking')->name('client.ranking');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('comment/{question_id}', 'TestController@postCommand')->name('client.comment.post');

        Route::get('histories', 'HistoryController@getHistories')->name('client.histories');

        Route::get('history/{history_id}', 'HistoryController@getHistory')->name('client.history');
    });
});
