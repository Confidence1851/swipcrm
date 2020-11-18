<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Hash;

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
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function username()
    {
        return 'username';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('check');

        // $users = User::get();
<<<<<<< HEAD
        User::where('email' , 'AdminPengwin')->update(['password' => Hash::make('password')]);
=======
        // dd($users);
        // User::where('username' , 'AdminPengwin')->update(['password' => Hash::make('password')]);
>>>>>>> 8eb323089743f9fbf80d2a7d06d12f79cd76e4f3
    }
}
