<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/usermanual', 'PagesController@usermanual');
//Route::POST('/comments/store', 'PagesController@storecomment');
Route::POST('/block/{id}', 'PagesController@blockstory');

Route::get('/profile/{id}', 'ProfileController@profile');
Route::get('/editprofile/{id}', 'ProfileController@editprofile');
Route::put('/editprofile/{id}', 'ProfileController@update');
Route::get('/profile/stories/{id}', 'ProfileController@profilestories');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('stories', 'StoriesController');

Route::resource('sections', 'SectionsController');

Route::resource('comments', 'CommentsController');
