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

Route::get('/productDetail/{id}','ProductController@detailProduct')->name('productDetail')->where('id', '[0-9]+');
Route::get('/productStore','ProductController@productStore')->name('productStore');

Route::get('/user/account','UserController@account')->name('account');
Route::get('/user/edit','UserController@edit')->name('account_edit');
Route::post('/user/edit','UserController@updateUser')->name('account_update');

Route::get('/search', 'Admin\UserController@search');
Route::get('/api/search', 'Admin\UserController@apiSearch')->name('seachapi');
Route::get('/searchType', 'Admin\TypeController@search');
Route::get('/searchCategory', 'Admin\CategoryController@search');
Route::get('/searchProduct', 'Admin\ProductController@search');
Route::get('/searchAuthor', 'Admin\AuthorController@search');

Route::get('/logout', 'Auth\LoginController@logout', function () {
	return abort(404);
});

//Cart
Route::group(['prefix' => 'cart'], function(){
	Route::get('/checkOut', 'CartController@cart')->name('checkOut'); 
	Route::get('/addToCart/{id}','CartController@addToCart');
	Route::get('/remove/{id}','CartController@remove');
	Route::get('/delete/{id}','CartController@delete')->name('delete');
	Route::get('/waitOrder', 'CartController@waitOrder')->name('waitOrder');
	Route::get('/confirmed', 'CartController@confirmed')->name('confirmed');
	Route::get('submit','CartController@submit_cart')->name('submit_cart')->middleware('auth');
	Route::get('/add_to_cart/{di}','CartController@apiAddToCart'); // API
});

//Dang nhap

Route::group(['middleware' => 'auth'], function(){
	//User
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

		//Commit
		Route::group(['prefix' => 'comment'], function(){
			Route::get('/list', 'Admin\RatingController@index')->name('Comment.List');
			Route::get('/search', 'Admin\RatingController@search')->name('Comment.Search');
			Route::delete('/deleted', 'Admin\RatingController@destroy');
		});

		//Category
		Route::group(['prefix' => 'category'], function(){
			Route::get('/view', 'Admin\CategoryController@index')->name('viewCategory');
			Route::get('/create', 'Admin\CategoryController@create')->name('create_category');
			Route::post('/create', 'Admin\CategoryController@store')->name('createCategory');
			Route::post('/edit', 'Admin\CategoryController@updateCategory')->name('editcategory');
			Route::get('/{id}/detail', 'Admin\CategoryController@detail')->name('detailCategory');
			Route::delete('{id}/delete','Admin\CategoryController@destroy')->name('deleteCategory');
		});

		//Cart manager
		Route::group(['prefix' => 'cartManager'], function(){
			Route::get('/view', 'Admin\CartManagerController@index')->name('viewCartManager');
		});
		
		//Author
		Route::group(['prefix' => 'author'], function(){
			Route::get('/view', 'Admin\AuthorController@index')->name('viewAuthor');
			Route::get('/create', 'Admin\AuthorController@create')->name('create_author');
			Route::post('/create', 'Admin\AuthorController@store')->name('createAuthor');
			Route::post('/edit', 'Admin\AuthorController@updateAuthor')->name('editauthor');
			Route::get('/{id}/detail', 'Admin\AuthorController@detail')->name('detailAuthor');
			Route::delete('{id}/delete','Admin\AuthorController@destroy')->name('deleteAuthor');
			
		});

		//Product
		Route::group(['prefix' => 'product'], function(){
			Route::get('/view', 'Admin\ProductController@index')->name('viewProduct');
			Route::get('/create', 'Admin\ProductController@create')->name('create_product');
			Route::post('/create', 'Admin\ProductController@store')->name('createProduct');
			Route::post('/edit', 'Admin\ProductController@updateProduct')->name('editproduct');
			Route::get('/{id}/detail', 'Admin\ProductController@detail')->name('detailProduct');
			Route::delete('{id}/delete','Admin\ProductController@destroy')->name('deleteProduct');
			
		});

		//Users
		Route::group(['prefix' => 'users'], function(){
			Route::get('/create', 'Admin\UserController@create')->name('create_user');
			Route::post('/create', 'Admin\UserController@store')-> name('createUser');
			Route::post('/edit', 'Admin\UserController@updateUser')->name('edituser');
			Route::get('/{id}/detail', 'Admin\UserController@detail')->name('detailUser');
			Route::delete('{id}/delete','Admin\UserController@destroy')->name('deleteUser');
			Route::get('/listuser', 'Admin\UserController@index')->name('admin');
			
		});
	});
});