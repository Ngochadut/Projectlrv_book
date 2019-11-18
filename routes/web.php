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
Route::get('/welcome',function(){
	return redirect()->route('welcome');
});

Route::get('/bookDetail/{id}','BookController@showBookDetailByID')->name('bookDetail')->where('id', '[0-9]+');

Route::get('/bookStore', 'HomeController@bookStore')->name('bookStore');

Route::get('/account', 'HomeController@account')->name('account');

Route::get('/checkOut', 'HomeController@checkOut')->name('checkOut');
Route::get('/account', 'HomeController@account')->name('câount');

Route::get('/logout', 'Auth\LoginController@logout', function () {
	return abort(404);
});

//Dang nhap

Route::group(['middleware' => 'auth'], function(){
	//user
	Route::group(['prefix' => 'admin','middleware' => 'admin'], function(){
		//vai bua lam edit user sau
	});

	
	//Admin
	Route::group(['prefix' => 'admin','middleware' => 'admin'], function(){

		Route::get('/', 'Admin\UserController@index')->name('admin');

		//Type
		Route::group(['prefix' => 'type'], function(){
			
			Route::get('/create', 'Admin\TypeController@create')->name('create_type');
			Route::post('/create', 'Admin\TypeController@store')-> name('createtype');
			Route::get('/view', 'Admin\TypeController@index')->name('viewType');
			Route::post('/edit', 'Admin\TypeController@updateType')->name('edittype');
			Route::get('/{id}/detail', 'Admin\TypeController@detail')->name('detailType');
			Route::delete('{id}/delete','Admin\TypeController@destroy')->name('deleteType');
		
			
		});
		//category
		Route::group(['prefix' => 'category'], function(){
			Route::get('/view', 'Admin\CategoryController@index')->name('viewCategory');
			Route::get('/create', 'Admin\CategoryController@create')->name('create_category');
			Route::post('/create', 'Admin\CategoryController@store')->name('createCategory');
			Route::post('/edit', 'Admin\CategoryController@updateCategory')->name('editcategory');
			Route::get('/{id}/detail', 'Admin\CategoryController@detail')->name('detailCategory');
			Route::delete('{id}/delete','Admin\CategoryController@destroy')->name('deleteCategory');
			
			
		});

		//author
		Route::group(['prefix' => 'author'], function(){
			Route::get('/view', 'Admin\AuthorController@index')->name('viewAuthor');
			Route::get('/create', 'Admin\AuthorController@create')->name('create_author');
			Route::post('/create', 'Admin\AuthorController@store')->name('createAuthor');
			Route::post('/edit', 'Admin\AuthorController@updateAuthor')->name('editauthor');
			Route::get('/{id}/detail', 'Admin\AuthorController@detail')->name('detailAuthor');
			Route::delete('{id}/delete','Admin\AuthorController@destroy')->name('deleteAuthor');
			
		});
	

		//product
		Route::group(['prefix' => 'product'], function(){
			Route::get('/view', 'Admin\ProductController@index')->name('viewProduct');
			Route::get('/create', 'Admin\ProductController@create')->name('create_product');
			Route::post('/create', 'Admin\ProductController@store')->name('createProduct');
			Route::post('/edit', 'Admin\ProductController@updateProduct')->name('editproduct');
			Route::get('/{id}/detail', 'Admin\ProductController@detail')->name('detailProduct');
			Route::delete('{id}/delete','Admin\ProductController@destroy')->name('deleteProduct');
			
		});

		//users
		Route::group(['prefix' => 'users'], function(){
			Route::get('/create', 'Admin\UserController@create')->name('create');
			Route::post('/create', 'Admin\UserController@store')-> name('createuser');
			Route::post('/edit', 'Admin\UserController@updateUser')->name('edituser');
			Route::get('/{id}/detail', 'Admin\UserController@detail')->name('detail');
			Route::delete('{id}/delete','Admin\UserController@destroy')->name('deleteUser');
			Route::get('/listuser', 'Admin\UserController@index')->name('listuser');
		});

	});
});