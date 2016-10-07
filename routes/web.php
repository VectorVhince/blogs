<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::resource('posts', 'PostController');

Route::resource('opinion', 'OpinionController');

Route::resource('news', 'NewsController');

Route::resource('features', 'FeaturesController');

Route::resource('editors', 'EditorsController');

Route::get('/', 'HomeController@index')->name('home');

Route::get('create', 'HomeController@create');

Route::get('featured/{id}/{category}', 'HomeController@featured')->name('featured');

Route::post('opinion.comment/{id}', 'OpinionController@opinionComment')->name('opinion.comment');

Route::post('post.comment/{id}', 'PostController@postComment')->name('post.comment');

Route::post('news.comment/{id}', 'NewsController@newsComment')->name('news.comment');

Route::post('features.comment/{id}', 'FeaturesController@featuresComment')->name('features.comment');

Route::post('editors.comment/{id}', 'EditorsController@editorsComment')->name('editors.comment');
