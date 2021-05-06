<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $guard = 'customer';

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
        //Seprate Auth login 
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->guard('customer')->attempt(array($fieldType => $request->username, 'password' => $request->password))) {
            // if (auth()->guard('customer')->attempt(array($fieldType => $request->username, 'customer_password' => $request->password))) {
            $user = Auth::user();
            // if (!empty(@$user->getRoleNames()))
            //     foreach ($user->getRoleNames() as $v) {
            //         if ($v == "Customer") {
            //             return redirect('home');
            //         } else {
            //             Auth::logout();
            //             return back()->withErrors(['email' => 'These credentials do not match our records.']);
            //         }
            //     }
            return redirect('customer-dashboard');
        } else {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }
}
