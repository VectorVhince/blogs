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
Route::get('myposts/{id}', 'HomeController@myPosts')->name('myposts');
Route::get('accounts', 'HomeController@accounts')->name('accounts');
Route::get('myposts/sortby/{id}', 'HomeController@myPostsSortBy')->name('myposts.sortBy');
Route::get('error', 'HomeController@error')->name('errors.503');
Route::get('about', 'HomeController@about')->name('about');
Route::patch('about/{id}', 'HomeController@aboutUpdate')->name('about.update');
Route::get('terms', 'HomeController@terms')->name('terms');
Route::patch('terms/{id}', 'HomeController@termsUpdate')->name('terms.update');
Route::get('privacy', 'HomeController@privacy')->name('privacy');
Route::patch('privacy/{id}', 'HomeController@privacyUpdate')->name('privacy.update');
Route::patch('weather/{id}', 'HomeController@weatherUpdate')->name('weather.update');
Route::patch('calendar/{id}', 'HomeController@calendarUpdate')->name('calendar.update');
Route::patch('selfopinion/{id}', 'HomeController@selfopinionUpdate')->name('selfopinion.update');
Route::patch('readalso/{id}', 'HomeController@readalsoUpdate')->name('readalso.update');
Route::patch('fromweb/{id}', 'HomeController@fromwebUpdate')->name('fromweb.update');
Route::patch('outsidesports/{id}', 'HomeController@outsidesportsUpdate')->name('outsidesports.update');

// Account Settings
Route::get('settings', 'HomeController@settings');
Route::patch('settings/{id}/change_password', 'HomeController@changePassword')->name('change.password');
Route::patch('settings/{id}/change_name', 'HomeController@changeName')->name('change.name');
Route::patch('settings/{id}/change_username', 'HomeController@changeUsername')->name('change.username');
Route::patch('settings/{id}/change_email', 'HomeController@changeEmail')->name('change.email');

// Create Post
Route::get('create', 'HomeController@create');
Route::post('create', 'HomeController@create')->name('create');

// Create Announcement
Route::get('create/announcement', 'HomeController@createAnnouncement')->middleware('superadmin');
Route::post('store/announcement', 'HomeController@storeAnnouncement')->name('store.announcement')->middleware('superadmin');

// Search
Route::get('search', 'HomeController@search')->name('search');

// Home Featured
Route::get('news/featured/{id}', 'NewsController@featured')->name('news.featured');
Route::get('editorial/featured/{id}', 'EditorialsController@featured')->name('editorial.featured');
Route::get('opinion/featured/{id}', 'OpinionController@featured')->name('opinion.featured');
Route::get('feature/featured/{id}', 'FeaturesController@featured')->name('feature.featured');
Route::get('humor/featured/{id}', 'HumorsController@featured')->name('humor.featured');
Route::get('sports/featured/{id}', 'SportsController@featured')->name('sports.featured');

// Home Unfeatured
Route::get('news/unfeatured/{id}', 'NewsController@unfeatured')->name('news.unfeatured');
Route::get('editorial/unfeatured/{id}', 'EditorialsController@unfeatured')->name('editorial.unfeatured');
Route::get('opinion/unfeatured/{id}', 'OpinionController@unfeatured')->name('opinion.unfeatured');
Route::get('feature/unfeatured/{id}', 'FeaturesController@unfeatured')->name('feature.unfeatured');
Route::get('humor/unfeatured/{id}', 'HumorsController@unfeatured')->name('humor.unfeatured');
Route::get('sports/unfeatured/{id}', 'SportsController@unfeatured')->name('sports.unfeatured');

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

// Redirect wrong url
Route::get('/{any}', function($any){
	return redirect()->route('errors.503');
})->where('any', '.*');