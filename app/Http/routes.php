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
Route::get('/', 'FrontController@index');
Route::get('about', 'FrontController@about');
Route::get('contact', 'FrontController@contact');

/*
 * Dashboard routes
 */
Route::get('dashboard', 'DashboardController@index');

/*
 * Resource routes
 */
Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');

/*
 * Other specific routes
 */
Route::put('post/{id}/status', 'PostController@updateStatus');