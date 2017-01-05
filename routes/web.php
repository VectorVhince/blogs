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

// Home Controllers
Route::get('/', 'HomeController@index')->name('home');
Route::get('settings', 'HomeController@settings');
Route::get('myposts', 'HomeController@myPosts');

// Create Post
Route::get('create', 'HomeController@create');
Route::post('create', 'HomeController@create')->name('create');

// Create Announcement
Route::get('create/announcement', 'HomeController@createAnnouncement');
Route::post('store/announcement', 'HomeController@storeAnnouncement')->name('store.announcement');

// Search
Route::get('search', 'HomeController@search')->name('search');

// Home Featured
Route::get('news/featured/{id}', 'NewsController@featured')->name('news.featured');
Route::get('editorial/featured/{id}', 'EditorialsController@featured')->name('editorial.featured');
Route::get('opinion/featured/{id}', 'OpinionController@featured')->name('opinion.featured');
Route::get('feature/featured/{id}', 'FeaturesController@featured')->name('feature.featured');
Route::get('humor/featured/{id}', 'HumorsController@featured')->name('humor.featured');
Route::get('sports/featured/{id}', 'SportsController@featured')->name('sports.featured');

// Sort By
Route::get('news/sortby', 'NewsController@sortBy')->name('news.sortBy');
Route::get('editorial/sortby', 'EditorialsController@sortBy')->name('editorial.sortBy');
Route::get('opinion/sortby', 'OpinionController@sortBy')->name('opinion.sortBy');
Route::get('feature/sortby', 'FeaturesController@sortBy')->name('feature.sortBy');
Route::get('humor/sortby', 'HumorsController@sortBy')->name('humor.sortBy');
Route::get('sports/sortby', 'SportsController@sortBy')->name('sports.sortBy');

//Resource
Route::resource('news', 'NewsController');
Route::resource('editorial', 'EditorialsController');
Route::resource('opinion', 'OpinionController');
Route::resource('feature', 'FeaturesController');
Route::resource('humor', 'HumorsController');
Route::resource('sports', 'SportsController');

// Comment
Route::post('news.comment/{id}', 'NewsController@newsComment')->name('news.comment');
Route::post('editorial.comment/{id}', 'EditorialsController@editorialsComment')->name('editorial.comment');
Route::post('opinion.comment/{id}', 'OpinionController@opinionComment')->name('opinion.comment');
Route::post('feature.comment/{id}', 'FeaturesController@featuresComment')->name('feature.comment');
Route::post('humor.comment/{id}', 'HumorsController@humorsComment')->name('humor.comment');
Route::post('sports.comment/{id}', 'SportsController@sportsComment')->name('sports.comment');
