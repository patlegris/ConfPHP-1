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
Route::get('/', 'FrontController@indexPost');
Route::get('about', 'FrontController@about');
Route::get('contact', 'FrontController@contact');

/*
 * Auth routes
 */
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
 * Dashboard routes
 */
Route::get('dashboard', 'DashboardController@indexPost');

/*
 * Resource routes
 */
Route::resource('conference', 'PostController');
Route::resource('comment', 'CommentController');

/*
 * Other specific routes
 */
Route::put('conference/{id}/status', 'PostController@updateStatus');