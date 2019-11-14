<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;//Request
use Spatie\Permission\Traits\HasRoles;//Permission
use Illuminate\Support\Facades\Auth;//Auth

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     * ログイン後のリダイレクト先
     * @var string
     */
	protected function redirectTo() {
		if (auth()->user() !== null && auth()->user()->hasRole('admin')) {
			return route('item.index');
		} else {
			return route('home');
		}
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     * ログイン画面直前
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm($role = null)
    {
		//ここでルーティングからの引数をとってsessionフラグ?
		session(['enter' => $role]);
        return view('auth.login');
    }

    /**
     * The user has been authenticated.
     * ログイン後の処理
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user) {
		/*
		 * login_address -> role
		 * --------------------
		 * login/		-> customer
		 * login/admin	-> admin
		 * login/other	-> other
		 */
		$role = $user->getRoleNames('items')[0];
		$is_customer_login = (session('enter') == null && $role == 'customer');
		$is_role_login = (session('enter') == $role);
		//debug
		// var_dump(session('enter'));
		// echo ' <- enter_flag ?' . '<br>';
		// echo $role . ' <- role ?' . '<br>';
		//
		if ($is_customer_login || $is_role_login) {
			//
		} else {
			Auth::logout();
		}
		//debug
		//  echo var_dump(Auth::check()) . ' <- is_login ?';
		//  exit;
	}
}
