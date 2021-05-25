<?php

namespace App\Http\Controllers;

use App\customers;
use App\Aproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Hash;

class CustomerController extends Controller
{
    public function dashboard()
    {
        if (!Auth::guard('customer')->user()) {
            return redirect('/');
        }
        $product_data = Aproducts::select('product_id', 'product_name', 'description', 'base_price', 'image_url')
            ->where(['deleted' => 0])->paginate(12);
        return view('customer/layouts/customer_dash', compact('product_data'));
    }



    public function index()
    {
        $customers = customers::where(['deleted' => 0])->paginate(5);

        return view('customer', compact('customers'));
    }
    public function store(Request $req)
    {

        $customers = new customers();
        $customers->company_name = $req->company_name;
        $customers->customer_firstname = $req->customer_firstname;
        $customers->customer_lastname = $req->customer_lastname;
        $customers->email = $req->email;
        $customers->customer_phone = $req->customer_phone;
        $customers->username = $req->username;
        $customers->password = Hash::make($req->password);
        $customers->customer_status = $req->customer_status;
        $customers->login_ip = $req->login_ip;
        $customers->last_login_at = $req->last_login_at;
        $customers['created_by'] = Auth::user()->id;
        $customers['updated_by'] = Auth::user()->id;
        $customers->save();
        return response()->json($customers);
    }
    public function edit($customer_id)
    {

        $customers = customers::find($customer_id);
        return response()->json($customers);
    }
    public function update(Request $req)
    {
        $customers = customers::find($req->customer_id);
        $customers->company_name = $req->company_name;
        $customers->customer_firstname = $req->customer_firstname;
        $customers->customer_lastname = $req->customer_lastname;
        $customers->email = $req->email;
        $customers->customer_phone = $req->customer_phone;
        $customers->username = $req->username;
        $customers->password = Hash::make($req->password);

        $customers->customer_status = $req->customer_status;
        $customers->login_ip = $req->login_ip;
        $customers->last_login_at = $req->last_login_at;
        $customers['updated_by'] = Auth::user()->id;
        $customers->save();
        return response()->json($customers);
    }
    public function destroy($customer_id)
    {
        $customers = customers::where('customer_id', $customer_id)
            ->update(['deleted' => 1]);

        return response()->json(['success' => 'Record has Been Deleted']);
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function save_profile(Request $request, $id)
    {
        $input = $request->all();
        if ($request->hasfile('customer_profile_image')) {
            $file = $request->file('customer_profile_image');
            $filename = rand(0, 999) . $file->getClientOriginalName();
            $destinationPath = public_path('customer_images/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
                exec('chmod -R 777 ' . $destinationPath);
            } else {
                exec('chmod -R 777 ' . $destinationPath);
            }
            $file->move($destinationPath, $filename);
            $input['customer_profile_image'] = $filename;
        } else {
            $input['customer_profile_image'] = $request->old_profile_image;
        }

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = customers::find($id);
        $user->update($input);
        return redirect('customer-profile')->with('success', 'Customer Profile updated successfully');
    }

    public function customer_reg(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        // $input['otp'] = '1234';
        // $api_key = '260A8BC52A8EAA';
        // $contacts = '9021121916';
        // $from = 'MPSMOT';
        // $template_id= '';
        // $sms_text = urlencode('Hello People, have a great day');

        // $api_url = "http://sms.textmysms.com/app/smsapi/index.php?key=".$api_key."&campaign=0&routeid=26&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;

        // //Submit to server

        // $response = file_get_contents( $api_url);
        // // echo $response;
        // $input['otp'] = $sms_text;

        $customers = customers::create($input);
        return redirect('/')->with('success', 'Your Registred Successfully Login Here');
    }

    public function check_customer_email(Request $request)
    {
        $response = 0;
        $cnt = customers::where('email', $request->email)->count();
        if ($cnt > 0) {
            $response = 1;
        }
        return $response;
    }
}
