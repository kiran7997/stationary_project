<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\customers;
use App\Orders as orders;

class OrderController extends Controller
{
    public function save_order(Request $request)
    {
        $order = new orders();
        $order['customer_id'] = Auth::guard('customer')->user()->customer_id;
        $order['product_id'] = $request->product_id;
        $order['product_name'] = $request->product_name;
        $order['quantity'] = $request->quantity;
        $order['price'] = $request->price;
        $order['total'] = $request->total;
        $order['order_status'] = $request->order_status;
        $order['order_date'] = date('d-m-Y H:i:s');
        $order['arrival_date'] = date('d-m-Y H:i:s');
        //payment details 
        $order['payment_date'] = $request->payment_date;
        $order['amount'] = $request->amount; //payment Amount
        $order['reference_number'] = $request->reference_number;
        $order['source'] = $request->source;
        //address details
        $order['firstname'] = $request->firstname;
        $order['lastname'] = $request->lastname;
        $order['email'] = $request->email;
        $order['phone_no'] = $request->phone_no;
        $order['address_type'] = $request->address_type;
        $order['house_no'] = $request->house_no;
        $order['landmark'] = $request->landmark;
        $order['pincode'] = $request->pincode;
        $order['city'] = $request->city;
        $order['state'] = $request->state;
        $order['created_by'] = Auth::guard('customer')->user()->customer_id;
        $order['updated_by'] = Auth::guard('customer')->user()->customer_id;
        $order->save();
        if (!$order->save()) {
            App::abort(500, 'Error');
        } else {
            return redirect('customer_dash')->with('success', 'User updated successfully');
        }
    }
}
