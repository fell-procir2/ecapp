<?php

//.\public\
Route::get('/', function () {
	return view('welcome');
});

Route::get('/hello', function() {
	return 'Hello world';
});

//item
Route::get('/item', 'ItemController@index')->name('item');
Route::get('/detail{id}', 'ItemController@detail')->name('item.detail');

//ホーム画面 -> ログインチェック
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
