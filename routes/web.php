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

Route::resource('humors', 'HumorsController');

Route::resource('sports', 'SportsController');

Route::resource('artworks', 'ArtworksController');

Route::get('/', 'HomeController@index')->name('home');

Route::get('create', 'HomeController@create');

Route::get('create/announcement', 'HomeController@createAnnouncement');

Route::post('store/announcement', 'HomeController@storeAnnouncement')->name('store.announcement');

Route::get('featured/{id}/{category}', 'HomeController@featured')->name('featured');

Route::post('opinion.comment/{id}', 'OpinionController@opinionComment')->name('opinion.comment');

Route::post('post.comment/{id}', 'PostController@postComment')->name('post.comment');

Route::post('news.comment/{id}', 'NewsController@newsComment')->name('news.comment');

Route::post('features.comment/{id}', 'FeaturesController@featuresComment')->name('features.comment');

Route::post('editors.comment/{id}', 'EditorsController@editorsComment')->name('editors.comment');

Route::post('humors.comment/{id}', 'HumorsController@humorsComment')->name('humors.comment');

Route::post('sports.comment/{id}', 'SportsController@sportsComment')->name('sports.comment');

Route::post('artworks.comment/{id}', 'ArtworksController@artworksComment')->name('artworks.comment');

