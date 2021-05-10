<?php

namespace App\Http\Controllers;

use App\customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Hash;
class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('customer_dash');
    }
    
    
    
    public function index()
    {
        $customers= customers::where(['deleted'=>0])->paginate(5);
       
        return view ('customer',compact('customers'));
       
    }public function store(Request $req)
    {
        
        $customers=new customers();
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
        $customers['created_by']=Auth::user()->id;
        $customers['updated_by']=Auth::user()->id;
        $customers->save();
        return response()->json($customers);
    }
     public function edit($customer_id)
    {
        
        $customers= customers::find($customer_id);
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
        $customers['updated_by']=Auth::user()->id;
        $customers->save();
        return response()->json($customers);
    }
       public function destroy($customer_id)
    {
        $customers=customers::where('customer_id',$customer_id)
                      ->update(['deleted'=>1]);
        
        return response()->json(['success'=>'Record has Been Deleted']);

    }


}
