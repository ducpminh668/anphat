<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }

    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin';
        }
        return '/admin';
    }

    public function authenticated()
    {
        $user = Auth::user();
        $user = Auth::user();
        if ($user->hasRole('administrator')) {
            return redirect('/home');
        } else if ($user->hasRole('customer')) {
            return redirect('/product-list');
        } else if ($user->hasRole('sale')) {
            return redirect('/orders/create');
        } else {
            return redirect('/orders/create');
        }
    }
}
