<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\customers;
use App\Orders;
use App\OrderItems;
use App\Aproducts;
use App\AddToCart;

class OrderController extends Controller
{
    public function save_order(Request $request)
    {
        // dd($request->all());
        $order = array();
        $order['customer_id'] = Auth::guard('customer')->user()->customer_id;
        $order['order_status'] = "order";
        $order['order_date'] = date('Y-m-d');
        $order['arrival_date'] = date('Y-m-d');
        $order['created_by'] = Auth::guard('customer')->user()->customer_id;
        $order['updated_by'] = Auth::guard('customer')->user()->customer_id;
        $order['pincode'] = "12344";
        if (empty($request->order_id[0])) {
            $save_order = Orders::create($order);
            if (!$save_order) {
                App::abort(500, 'Error');
            } else {
                $this->store_order_items($save_order->order_id, $request);
            }
        } else {
            $update_order = Orders::where('order_id', $request->order_id[0])->update($order);
            $this->store_order_items($request->order_id[0], $request);
        }
        return 'success';
    }

    public function store_order_items($order_id, $request)
    {
        $i = 0;
        $amount = 0.00;
        $update_order_amount = array();
        for ($i = 0; $i < sizeof($request->cart_id); $i++) {
            $order_item_data = array();
            $order_item_data['product_id'] = $request->product_id[$i];
            $order_item_data['product_color'] = "";
            $order_item_data['product_type'] = "";

            $product_details = Aproducts::select('product_name', 'base_price', 'taxable')->where('product_id', $request->product_id[$i])->first();

            if (!empty($product_details)) {
                $order_item_data['product_name'] = $product_details->product_name;
                $order_item_data['price'] = $product_details->base_price;
                $order_item_data['taxable'] = $product_details->taxable;
            } else {
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

            $amount = $amount + $order_item_data['amount'];

            if (!empty($request->order_item_id[$i])) {
                $order_item_data['order_id'] = $request->order_id[$i];
                $save_item_data = OrderItems::where('order_item_id', $request->order_item_id[$i])->update($order_item_data);
                $order_item_id = $request->order_item_id[$i];
            } else {
                $order_item_data['order_id'] = $order_id;
                $save_item_data = OrderItems::create($order_item_data);
                $order_item_id = $save_item_data->order_item_id;
            }
            $update_order_id_in_addToCart = AddToCart::where('cart_id', $request->cart_id[$i])->update(array('order_id' => $order_id, 'order_item_id' => $order_item_id));
        }
        $update_order_amount['amount'] = $amount;
        $update_order_amount = Orders::where('order_id', $order_id)->update($update_order_amount);
    }

    public function save_order_address(Request $request)
    {
        $formdata = $request->all();
        $address_details = array();
        $address_details['firstname'] = $formdata['firstname'];
        $address_details['lastname'] = $formdata['lastname'];
        $address_details['email'] = $formdata['email'];
        $address_details['phone_no'] = $formdata['phone_no'];
        $address_details['house_no'] = $formdata['house_number'];
        $address_details['landmark'] = $formdata['landmark'];
        $address_details['state'] = $formdata['state'];
        $address_details['district'] = $formdata['district'];
        $address_details['city'] = $formdata['city'];
        $address_details['zip'] = $address_details['pincode'] = $formdata['pincode'];
        $address_details['address_type'] = $formdata['address_type'];
        $update_order_address = Orders::where('order_id', $formdata['order_id'][0])->update($address_details);
        return "success";
    }

    public function save_payment(Request $request)
    {
        // dd($request->all());
        $formdata = $request->all();
        $data = array();
        if ($request->hasfile('payment_file')) {

            $file = $request->file('payment_file');
            $filename = rand(0, 999) . $file->getClientOriginalName();
            $destinationPath = public_path('payment_receipts/');
            $file->move($destinationPath, $filename);
            $data['payment_file'] = $filename;
        }

        // exit;
        // $data['order_status'] = "payment completed";
        $data['payment_date'] = date('Y-m-d');
        $data['payment_status'] = $request->payment_status;
        $update_order_address = Orders::where('order_id', $formdata['order_id'][0])->update($data);
        $data1 = array();
        $data1['deleted'] = 1;
        $update_add_to_Cart = AddToCart::where('order_id', $formdata['order_id'][0])->update($data1);
        $users = \App\User::select('id')->where(['department' => 'Account'])->get();
        //notification to account and sales 
        foreach ($users as $row) {
            $notification['order_id'] = $formdata['order_id'][0];
            $notification['user_id'] = $row['id'];
            $notification['role_id'] = 3;
            $notification['notification_type'] = 'Account';
            $notification['notification_date'] = date('Y-m-d');
            \App\Notification::create($notification);
        }
        return "success";
    }

    public function editReturnProduct($order_id)
    {

        $order = OrderItems::select('order_id', 'product_name', 'quantity')
            ->where('order_id', '=', $order_id)->first();

        return response()->json($order);
    }
    public function updateReturnProduct(Request $req)
    {

        $order_id = $req->order_id;
        // dd ($order_id);
        $data_customer = OrderItems::select('order_status', 'order_id')->where(['order_item_id' => $order_id])->update(['order_status' => 'return', 'return_date' => date('Y-m-d')]);
        return "success";
        //return redirect('my-order');
    }
}
