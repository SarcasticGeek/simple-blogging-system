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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'ArticleController@index')->name('home');
    Route::group(['prefix' => 'article'], function () {
        Route::get('/create', 'ArticleController@add')->name('create-article');
        Route::post('/create', 'ArticleController@store')->name('create-action-article');
        Route::get('{id}/edit', 'ArticleController@update')->name('update-article');
        Route::post('{id}/update', 'ArticleController@updateaction')->name('update-action-article');
        Route::delete('{id}/delete', 'ArticleController@delete')->name('delete-action-article');
        Route::get('{id}/save', 'ArticleController@save')->name('save-article');
        Route::get('{id}/unsave', 'ArticleController@unsave')->name('unsave-article');
        Route::get('{id}/publish', 'ArticleController@publish')->name('publish-article');
        Route::get('{id}/unpublish', 'ArticleController@unpublish')->name('unpublish-article');
        Route::post('{id}/comment', 'CommentController@create')->name('comment-article');
        Route::get('{id}', 'ArticleController@showone')->name('view-article');
    });
    Route::group(['prefix' => 'cat'], function () {
        Route::get('/create', 'CatController@add')->name('create-cat');
        Route::post('/create', 'CatController@store')->name('create-action-cat');
        Route::delete('{id}/delete', 'CatController@delete')->name('delete-action-cat');
        Route::get('{id}/articles', 'CatController@getarticles')->name('get-articles-by-cat');
    });
    Route::get('my-articles','UserController@showMyArticles')->name('view-my-article');
    Route::get('my-saved-articles','UserController@showMySavedArticles')->name('view-my-saved-article');
});
