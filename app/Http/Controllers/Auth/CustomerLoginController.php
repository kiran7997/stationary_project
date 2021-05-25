<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

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
            $customer_mobile = Auth::guard('customer')->user()->customer_phone;
            $customer_id = Auth::guard('customer')->user()->customer_id;
            $sms_verification = Auth::guard('customer')->user()->sms_verification;
            //SMS code
            if($sms_verification == 0){
                $api_key = '260A8BC52A8EAA';
                $contacts = $customer_mobile;
                $from = 'MPSMOT';
                $template_id= '';
                $code = rand(1111,9999);
                $sms_text = urlencode('Your Verification code is '.$code);
                $api_url = "http://sms.textmysms.com/app/smsapi/index.php?key=".$api_key."&campaign=0&routeid=26&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
                $response = file_get_contents( $api_url);
                //SMS code
                
                $data_customer = DB::table('customers')->where(['customer_id'=>$customer_id])->update(['otp' => $code]);
                // dd($data_customer);
                // $customer_data = Auth::guard('customer')->user()->otp;
                if($data_customer){
                    return redirect('verify-otp');
                }
            }else{
                return redirect('customer-dashboard');
            }            
        } else {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function otpValidation(){
        $customer_data = Auth::guard('customer')->user()->customer_id;
        return view('otp',['customer_data'=>$customer_data]);
    }

    public function verifyOTP(Request $request){
        $requestData = $request->all();
        // dd($requestData);
        $customer_data = Auth::guard('customer')->user()->otp;
        if($requestData['otp'] == $customer_data){
            DB::table('customers')->where(['customer_id'=>$requestData['customer_id']])->update(['otp' => '','sms_verification'=>1]);
            return redirect('customer-dashboard');
        }        
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect('/');
    }
}
