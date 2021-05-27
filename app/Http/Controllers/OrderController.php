<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\customers;
use App\Orders as orders;
use App\OrderItems as order_items;
use App\Aproducts;
use App\AddToCart;

class OrderController extends Controller
{
    public function save_order(Request $request)
    {
        $order = new orders();
        $order['customer_id'] = Auth::guard('customer')->user()->customer_id;
        $order['order_status'] = "order";
        $order['order_date'] = date('Y-m-d');
        $order['arrival_date'] = date('Y-m-d');
        $order['created_by'] = Auth::guard('customer')->user()->customer_id;
        $order['updated_by'] = Auth::guard('customer')->user()->customer_id;
        $order['pincode'] = "12344";
        $order->save();

        if (!$order->save()) {
            App::abort(500, 'Error');
        } else {
            $i = 0;
            for($i = 0; $i < sizeof($request->cart_id); $i++){
                $order_item_data = new order_items();
                $order_item_data['product_id'] = $request->product_id[$i];
                $order_item_data['order_id'] = $order->order_id;
                $order_item_data['product_color'] = "";
                $order_item_data['product_type'] = "";

                $product_details = Aproducts::select('product_name', 'base_price', 'taxable')->where('product_id', $request->product_id[$i])->first();
                if(!empty($product_details)){
                    $order_item_data['product_name'] = $product_details->product_name;
                    $order_item_data['price'] = $product_details->base_price;
                    $order_item_data['taxable'] = $product_details->taxable;
                }else{
                    $order_item_data['product_name'] = "";
                    $order_item_data['price'] = 0.00;
                    $order_item_data['taxable'] = 0;
                }
                
                $order_item_data['quantity'] = $request->qyantity[$i];
                $order_item_data['subtotal'] = $request->qyantity[$i] * $order_item_data['price'];
                $order_item_data['tax_rate'] = 0.00;
                $order_item_data['tax_amount'] = 0.00;
                $order_item_data['total'] = $request->qyantity[$i] * $order_item_data['price'];
                $order_item_data['amount'] = $request->qyantity[$i] * $order_item_data['price'];
                $order_item_data['deleted'] = 0;
                $order_item_data['created_by'] = Auth::guard('customer')->user()->customer_id;
                $order_item_data['updated_by'] = Auth::guard('customer')->user()->customer_id;
                $order_item_data->save();
                
                $update_order_id_in_addToCart = AddToCart::where(array('cart_id' => $request->cart_id[$i]))->update('order_id', $order->order_id);
            }
        }
        // return redirect('customer_dash')->with('success', 'User updated successfully');   
    }
}