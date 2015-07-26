<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Front routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'FrontController@getHome');
Route::get('a-propos', 'FrontController@getAbout');
Route::get('contact', 'FrontController@getContact');
Route::get('legal-notice', 'FrontController@getLegalNotice');

Route::post('search', 'FrontController@postSearch');
Route::post('contact', 'FrontController@postContact');

/*
|--------------------------------------------------------------------------
| Dashboard routes - with middleware 'auth' and 'dashboard' prefix
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::resource('conference', 'PostController');
    Route::resource('comment', 'CommentController');

    Route::get('all-comment', 'CommentController@getAll');
    Route::get('publish-comment', 'CommentController@getPublish');
    Route::get('unpublish-comment', 'CommentController@getUnpublish');
    Route::get('spam-comment', 'CommentController@getSpam');

    Route::put('conference/{id}/status', 'PostController@putStatus');
    Route::put('comment/{id}/publish', 'CommentController@putPublish');
    Route::put('comment/{id}/unpublish', 'CommentController@putUnpublish');
    Route::put('comment/{id}/spam', 'CommentController@putSpam');
});

Route::get('sort-comment/{status}', 'DashboardController@getSortComment');

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::post('login', 'Auth\AuthController@postLogin');


/*
 * Resource routes
 */



/*
 * Other specific routes
 */
/*Route::get('validate-comment', 'CommentController@validateComment');

Route::put('comment/{id}/publish', 'CommentController@putPublish');
Route::put('comment/{id}/unpublish', 'CommentController@putUnpublish');
Route::put('comment/{id}/spam', 'CommentController@putSpam');*/