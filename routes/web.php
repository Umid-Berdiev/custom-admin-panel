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

Route::get('/', function(Illuminate\Http\Request $request) {
	return redirect()->route("home.page", 'ru');
});

Route::get('get_regions', 'PagesController@getRegions')->name('get_regions');
Route::get('filtered_posts', 'PagesController@getFilteredPosts')->name('filtered_posts');

Route::group(['prefix' => 'admin'], function () {
	Route::any('pages/store', 'PagesController@grapesStore')->name('grapes.store');
	Route::get('pages/load', 'PagesController@grapesLoad')->name('grapes.load');
	Voyager::routes();
});

Route::group(['middleware' => 'setlocale'], function () {
	Route::get('/{locale}', 'PagesController@homePage')->name('home.page');
	Route::get('pages/posts/{locale}', 'PagesController@postsPage')
		->name('posts');
	Route::get('pages/single_post/{id}/{locale}', 'Voyager\PostController@singlePostShow')
		->name('single-post-show');
	Route::get('pages/directories/{locale}', 'PagesController@directoriesPage')
		->name('directories-page');
	Route::get('pages/infodigest/{locale}', 'PagesController@infodigestPage')
		->name('infodigest-page');
});
