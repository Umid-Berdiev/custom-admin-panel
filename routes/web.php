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

Route::group(['prefix' => 'admin'], function () {
	Route::any('pages/store', 'PagesController@grapesStore')->name('grapes.store');
	Route::get('pages/load', 'PagesController@grapesLoad')->name('grapes.load');
	Voyager::routes();
});

// Route::get('{slug}/{locale}', 'PagesController@getPage');

Route::group(['middleware' => 'setlocale'], function () {
	Route::get('/{locale}', 'PagesController@homePage');
	Route::get('pages/single_post/{id}/{locale}', 'Voyager\PostController@singlePostShow')
		->name('single-post-show');
});
