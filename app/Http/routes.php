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
| Dashboard routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', 'DashboardController@indexPost');
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
Route::resource('conference', 'PostController');
Route::resource('comment', 'CommentController');

/*
 * Other specific routes
 */
Route::get('validate-comment', 'CommentController@validateComment');
Route::put('conference/{id}/status', 'PostController@updateStatus');
Route::put('comment/{id}/publish', 'CommentController@putPublish');
Route::put('comment/{id}/unpublish', 'CommentController@putUnpublish');
Route::put('comment/{id}/spam', 'CommentController@putSpam');