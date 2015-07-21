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
 * Front routes
 */
Route::get('/', 'BlogController@indexPublishPosts');
Route::get('about', 'BlogController@about');
Route::get('contact', 'BlogController@contact');

/*
 * Dashboard routes
 */
Route::get('dashboard', 'BlogController@indexAllPosts');

/*
 * Resource routes
 */
Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');

/*
 * Other specific routes
 */
Route::put('post/{id}/status', 'PostController@updateStatus');