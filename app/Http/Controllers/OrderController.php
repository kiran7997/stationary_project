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
            $order['order_status'] = "order";
            $order['order_date'] = date('d-m-Y H:i:s');
            $order['arrival_date'] = date('d-m-Y H:i:s');
            $order['created_by'] = Auth::guard('customer')->user()->customer_id;
            $order['updated_by'] = Auth::guard('customer')->user()->customer_id;
            $order->save();
            
            // $i = 0;
            // for($i = 0; $i < sizeof($cart_id); $i++){
            
            //     if (!$order->save()) {
            //         App::abort(500, 'Error');
            //     } else {
            //         return redirect('customer_dash')->with('success', 'User updated successfully');
            //     }
            // }
    }
}
