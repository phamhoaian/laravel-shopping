<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
Route::get('/', 'PagesController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::group(['prefix' => 'cate'], function(){
		Route::get('list', ['as' => 'admin.cate.list', 'uses' => 'CateController@getList']);
		Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'CateController@getAdd']);
		Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'CateController@postAdd']);
		Route::get('delete/{id}', ['as' => 'admin.cate.getDelete', 'uses' => 'CateController@getDelete']);
		Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'CateController@getEdit']);
		Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'CateController@postEdit']);
	});
	Route::group(['prefix' => 'product'], function(){
		Route::get('list', ['as' => 'admin.product.list', 'uses' => 'ProductController@getList']);
		Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'ProductController@getAdd']);
		Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'ProductController@postAdd']);
		Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'ProductController@getDelete']);
		Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'ProductController@getEdit']);
		Route::match(array('PUT', 'PATCH'), 'edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'ProductController@postEdit']);
		Route::get('del_img/{id}', ['as' => 'admin.product.getDelImage', 'uses' => 'ProductController@getDelImage']);
	});
	Route::group(['prefix' => 'user'], function(){
		Route::get('list', ['as' => 'admin.user.list', 'uses' => 'UserController@getList']);
		Route::get('add', ['as' => 'admin.user.getAdd', 'uses' => 'UserController@getAdd']);
		Route::post('add', ['as' => 'admin.user.postAdd', 'uses' => 'UserController@postAdd']);
		Route::get('delete/{id}', ['as' => 'admin.user.getDelete', 'uses' => 'UserController@getDelete']);
		Route::get('edit/{id}', ['as' => 'admin.user.getEdit', 'uses' => 'UserController@getEdit']);
		Route::match(array('PUT', 'PATCH'), 'edit/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'UserController@postEdit']);
	});
});

Route::get('category/{id}/{alias}', ['as' => 'category', 'uses' => 'PagesController@category']);
Route::get('product/{id}/{alias}', ['as' => 'product', 'uses' => 'PagesController@product']);
Route::get('add-to-cart/{id}/{productname}', ['as' => 'addToCart', 'uses' => 'PagesController@addToCart']);
Route::get('cart', ['as' => 'cart', 'uses' => 'PagesController@cart']);
Route::get('cart-delete/{id}', ['as' => 'cartDelete', 'uses' => 'PagesController@cartDelete']);
Route::get('cart-update/{id}/{qty}', ['as' => 'cartUpdate', 'uses' => 'PagesController@cartUpdate']);