<?php

//welcome/home
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

//Cart & Address: logined && customer
Route::group(['middleware' => ['web']], function() {
	Route::group(['middleware' => ['role:customer']], function() {
		//cart
		Route::get('/cart', 'CartController@index')->name('cart.index');//一覧
		Route::post('/cart/add', 'CartController@add')->name('cart.add');//追加
		Route::post('/cart/delete', 'CartController@delete')->name('cart.delete');//削除
		//address
		Route::get('/address', 'AddressController@index')->name('address.index');//一覧
		Route::get('/address/reedit', 'AddressController@reEdit')->name('address.reEdit');//再編集
		Route::post('/address/edit', 'AddressController@edit')->name('address.edit');//編集
		Route::post('/address/delete', 'AddressController@delete')->name('address.delete');//削除
		Route::post('/address/add', 'AddressController@add')->name('address.add');//追加
		Route::post('/address/update', 'AddressController@update')->name('address.update');//アップデート
	});
});

//item
Route::get('/item', 'ItemController@index')->name('item.index');
Route::get('/item/detail/{id}', 'ItemController@detail')->name('item.detail');

//Item: logined && admin
Route::group(['middleware' => ['web']], function() {
	Route::group(['middleware' => ['role:admin']], function() {
		//共用get
		Route::get('/item/edit', 'ItemController@edit')->name('item.edit');
		//商品追加
		Route::post('/item/create', 'ItemController@create')->name('item.create');//item追加
		//detail -> 商品編集
		Route::post('/item/edit', 'ItemController@edit')->name('item.edit');
		Route::post('/item/update', 'ItemController@update')->name('item.update');//item編集
	});
});

//Auth
Auth::routes();
//role
Route::get('/login/{role?}', 'Auth\LoginController@showLoginForm');
