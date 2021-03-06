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
	Route::get('posts/{locale}', 'PagesController@postsPage')
		->name('posts');
	Route::get('single_post/{id}/{locale}', 'PagesController@singlePostPage')
		->name('single-post-page');
	Route::get('directories/{locale}', 'PagesController@directoriesPage')
		->name('directories-page');
	Route::get('infodigest/{locale}', 'PagesController@infodigestPage')
		->name('infodigest-page');
	Route::post('infodigest/{locale}', 'PagesController@redirectFromHomeToInfodigest')
		->name('filtered_posts_from_home');
});
