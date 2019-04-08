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

Route::get('/', 'BlogController@index');

Route::get('loginuser', 'UserController@login')->name('loginuser');
Route::post('loginuser', 'UserController@authenticate');
Route::get('registeruser', 'UserController@register');
Route::post('registeruser', 'UserController@storeuser');
Route::get('userlogout', 'UserController@logout');
Route::post('userlogout', 'UserController@logout');

Route::group(['middleware' => ['auth']], function () {

	Route::get('/home', 'BlogController@index');
	Route::post('home', 'BlogController@index');

	Route::get('blog/create', 'BlogController@create');
	Route::post('blog', 'BlogController@store');
	Route::get('blog/edit/{id}', 'BlogController@edit');
	Route::post('blog/{id}', 'BlogController@update')->where('id', '[0-9]+');
	Route::get('blog/delete/{id}', 'BlogController@destroy')->where('id', '[0-9]+');
	Route::get('blog/show/{id}', 'BlogController@show');

});

