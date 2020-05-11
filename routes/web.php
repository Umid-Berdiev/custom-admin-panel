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

Route::get('/', 'PagesController@homePage');

Route::group(['prefix' => 'admin'], function () {
	Route::any('pages/store', 'PagesController@grapesStore')->name('grapes.store');
	Route::get('pages/load', 'PagesController@grapesLoad')->name('grapes.load');
	Voyager::routes();
});

Route::get('{slug}/{locale}', 'PagesController@getPage')->middleware('setlocale');

Route::get('pages/single_post/{id}', 'Voyager\PostController@singlePostShow')
	->name('single-post-show')
	->middleware('setlocale');
