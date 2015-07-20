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

Route::get('/', 'BlogController@indexPublishPosts');
Route::get('dashboard', 'BlogController@indexAllPosts');

Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');

Route::put('post/{id}/status', 'PostController@updateStatus');