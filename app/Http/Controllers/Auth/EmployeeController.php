<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Hash;
use App\Http\Controllers\getFactorial;

class EmployeeController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.employee_login');
    }

    public function login(Request $request)
    {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $request->username, 'password' => $request->password))) {
            $user = Auth::user();
            if (!empty($user->getRoleNames()))
                foreach ($user->getRoleNames() as $v) {
                    if (($v != "Admin") && ($v != "Customer")) {
                        return redirect('employee-dashboard');
                    } else {
                        Auth::logout();
                        return back()->withErrors(['email' => 'These credentials do not match our records.']);
                    }
                }
        } else {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('employees-login');
    }
}
