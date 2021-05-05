<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.customer_login');
    }

    public function login(Request $request)
    {
        //auth user present or not if present check user role is Customer login
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $request->username, 'password' => $request->password))) {
            $user = Auth::user();
            if (!empty($user->getRoleNames()))
                foreach ($user->getRoleNames() as $v) {
                    if ($v == "Customer") {
                        return redirect('home');
                    } else {
                        Auth::logout();
                        return back()->withErrors(['email' => 'These credentials do not match our records.']);
                    }
                }
        } else {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }
}
