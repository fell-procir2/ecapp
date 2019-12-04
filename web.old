<?php

//welcome/home
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

//item
Route::get('/item', 'ItemController@index')->name('item.index');
Route::get('/item/detail/{id}', 'ItemController@detail')->name('item.detail');

//logined && admin
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
