<?php

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('logout','Auth\AuthController@getLogout');

Route::post('login','Auth\AuthController@postLogin');

/*
|--------------------------------------------------------------------------
| Front routes
|--------------------------------------------------------------------------
*/
Route::get('/',                 'FrontController@getHome');
Route::get('a-propos',          'FrontController@getAbout');
Route::get('contact',           'FrontController@getContact');
Route::get('legal-notice',      'FrontController@getLegalNotice');
Route::get('conference/{id}',   'FrontController@getShowPost');

Route::post('search',           'FrontController@postSearch');
Route::post('contact',          'FrontController@postContact');

/*
|--------------------------------------------------------------------------
| Dashboard routes - with middleware 'auth' and 'dashboard' prefix
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'dashboard'], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::resource('conference', 'PostController');

        /* Ajax routes for sort (Comment) */
        Route::get('all-comment',       'CommentController@getAll');
        Route::get('publish-comment',   'CommentController@getPublish');
        Route::get('unpublish-comment', 'CommentController@getUnpublish');
        Route::get('spam-comment',      'CommentController@getSpam');

        /* Ajax routes for change status (Comment and Post) */
        Route::put('comment/{id}/publish',      'CommentController@putPublish');
        Route::put('comment/{id}/unpublish',    'CommentController@putUnpublish');
        Route::put('comment/{id}/spam',         'CommentController@putSpam');
        Route::put('conference/{id}/status',    'PostController@putStatus');
    });

    Route::resource('comment', 'CommentController');
});