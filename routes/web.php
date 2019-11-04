<?php

//.\public\
Route::get('/', function () {
	return view('welcome');
});

Route::get('/hello', function() {
	return 'Hello world';
});

//ログイン状態
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
