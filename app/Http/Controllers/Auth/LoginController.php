<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
    //         $employee_data = $user = Auth::guard('web')->user();
    //         return redirect('home');
    //     }
    //     return back()->withErrors(['email' => 'These credentials do not match our records.']);
    // }
    public function login(Request $request)
    {
        //auth user present or not if present check user role is Admin login 
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $request->username, 'password' => $request->password))) {
            $user = Auth::user();
            if (!empty($user->getRoleNames()))
                foreach ($user->getRoleNames() as $v) {
                    if ($v == "Admin") {
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

    public function logout()
    {
        Auth::logout();
        return redirect('admin-login');
    }
}
