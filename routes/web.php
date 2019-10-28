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



Auth::routes();
Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/home',function(){
	return redirect()->route('welcome');
});

Route::get('/bookDetail/{id}','BookController@showBookDetailByID')->name('bookDetail')->where('id', '[0-9]+');

Route::get('/bookStore', 'HomeController@bookStore')->name('bookStore');

Route::get('/account', 'HomeController@account')->name('account');



Route::get('/checkOut', 'HomeController@checkOut')->name('checkOut');


Route::get('/logout', 'Auth\LoginController@logout', function () {
	return abort(404);
});





//ADMIN
Route::get('admin/index', 'Admin\HomeController@index')->name('home');