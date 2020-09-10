<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
	public function datail() {
		//auth::idでデータを引っ張って表示
	}

	public function update(UserRequest $request) {
		//auth::idでパスワードチェック
		//ｏｋならupdate
	}
    //
}
