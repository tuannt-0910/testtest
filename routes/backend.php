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

Route::get('admin/login', 'Auth\LoginController@getLoginAdmin')->name('admin.getLogin');
Route::post('admin/login', 'Auth\LoginController@login')->name('admin.postLogin');

Route::get('admin/first-login', 'FirstLoginController@getFirstLoginAdmin')->name('admin.getFirstLogin');
Route::post('admin/first-login', 'FirstLoginController@postFirstLogin')->name('admin.postFirstLogin');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'checkFirstLogin', 'checkAdminLogin', 'MarkNotifyAsRead']
], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', 'UserController@getNotifications')->name('admin.getNotifications');

        Route::get('read', 'UserController@readNotify')->name('admin.readNotify');
    });

    Route::group(['prefix' => 'users', 'middleware' => 'checkViewUsers'], function () {
        Route::get('/', 'UserController@index')->name('admin.users.index');

        Route::get('profile/{id?}', 'UserController@profile')->name('admin.users.profile');

        Route::get('edit/{id?}', 'UserController@edit')->name('admin.users.edit');
        Route::post('edit/{id?}', 'UserController@update')->name('admin.users.update');

        Route::get('delete/{id}', 'UserController@delete')->name('admin.users.delete');

        Route::get('role_tests/{user_id}', 'UserController@getRoleTest')->name('admin.users.role_tests');
        Route::post('role_tests/{user_id}', 'UserController@postRoleTest')->name('admin.users.postRoleTest');
    });

    Route::resource('categories', 'CategoryController')->middleware('checkViewCategories')
        ->except(['show']);

    Route::group(['prefix' => 'tests', 'middleware' => 'checkViewTests'], function () {
        Route::get('choose-add-question/{test_id}', 'TestController@getChooseAddQuestion')
            ->name('admin.questions.chooseAddQuestion');
        Route::post('choose-add-question/{test_id}', 'TestController@postChooseAddQuestion')
            ->name('admin.questions.postChooseAddQuestion');
        Route::get('search_question', 'QuestionController@getSearchQuestion')->name('admin.question.search');

        Route::get('getTests', 'TestController@getTests')->name('admin.test.getTests');
    });
    Route::resource('tests', 'TestController')->middleware('checkViewTests');

    Route::group(['prefix' => 'questions', 'middleware' => 'checkViewQuestions'], function () {
        Route::get('getQuestions', 'QuestionController@getQuestions')->name('admin.questions.getQuestions');

        Route::get('import', 'QuestionController@getImport')->name('admin.questions.getImport');
        Route::post('import', 'QuestionController@postImport')->name('admin.questions.postImport');
    });
    Route::resource('questions', 'QuestionController')->middleware('checkViewQuestions');

    Route::group(['middleware' => 'checkViewCommands'], function () {
        Route::resource('comments', 'CommentController')->except(['show', 'edit', 'update', 'create']);
        Route::get('getComments', 'CommentController@getComments')->name('admin.comments.getComments');
    });

    Route::group(['prefix' => 'backups', 'middleware' => 'checkViewBackups'], function () {
        Route::get('/', 'BackupController@index')->name('admin.backup.getList');
    });
});
