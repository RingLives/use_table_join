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

Route::get('/', function () {
    return Redirect()->Route('home');
    // return view('welcome');
});

Auth::routes();

/*****************************
 *	Home Route               *
 *****************************/
Route::get('/home', 'HomeController@index')->name('home');

/*****************************
 *	Profile Route            *
 *****************************/

Route::any('/profile/{uuid?}', 'ProfileController@index')->name('profile_action');

/*****************************
 *	Posts Route              *
 *****************************/
Route::post('/post', 'PostController@store')->name('post_action');

/*****************************
 *	Likes Route              *
 *****************************/
Route::any('/like','LikeController@store')->name('like_action');

/*****************************
 *	Commnets Route           *
 *****************************/
Route::any('/comment','CommentController@store')->name('comment_action');

/*****************************
 *	Share Route           *
 *****************************/
Route::any('/share','ShareController@store')->name('share_action');
