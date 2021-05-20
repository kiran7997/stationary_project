<?php

namespace App\Http\Controllers;

use App\Aproducts;
use Illuminate\Http\Request;
use App\AddToCart;
use Auth;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index()
    {
        $product_data = Aproducts::select('product_id', 'product_name', 'description', 'base_price', 'image_url')
            ->where(['deleted' => 0])->get();
        return view('shop', ['product_data' => $product_data]);
    }

    public function details($product_id)
    {
        $product_data = $add_to_cart = array();
        $product_data = Aproducts::find($product_id);
        $add_to_cart = AddToCart::select('cart_id')->where(['product_id' => $product_id, 'customer_id' => Auth::guard('customer')->user()->customer_id])->first();
        return view('customer/layouts/details', ['product_data' => $product_data, 'add_to_cart_data' => $add_to_cart]);
    }

    public function cart()
    {
        $cart_data = AddToCart::join('aproducts', 'aproducts.product_id', 'add_to_carts.product_id')
            ->join('customers', 'customers.customer_id', 'add_to_carts.customer_id')
            ->select("add_to_carts.cart_id", "add_to_carts.product_id", "add_to_carts.customer_id", "add_to_carts.quantity", "add_to_carts.product_price", "add_to_carts.amount", "customers.customer_firstname", "customers.customer_lastname", "aproducts.product_name", "aproducts.image_url", "aproducts.description")
            ->where(["add_to_carts.deleted" => 0])
            ->get();

        $days_7 = Carbon::now();
        $days_7 = Carbon::parse($days_7->addDays(7));

        return view('customer/layouts/checkout', ['cart_data' => $cart_data, 'days_7' => $days_7]);
    }

    public function InsertIntoCart(Request $request)
    {

        $data = $product_data = $existing_in_cart = array();
        $msg = "";
        $data['product_id'] = $request->product_id;
        $data['customer_id'] = Auth::guard('customer')->user()->customer_id;
        $data['updated_by'] = Auth::guard('customer')->user()->customer_id;

        $product_data = Aproducts::select("base_price")->where('product_id', $request->product_id)->first();
        if (!empty($product_data)) {
            $data['product_price'] = $product_data->base_price;
        } else {
            $data['product_price'] = 0.00;
        }

        $existing_in_cart = AddToCart::select('cart_id', 'quantity')->where(['product_id' => $request->product_id, 'customer_id' => Auth::guard('customer')->user()->customer_id, 'deleted' => 0])->first();
        if (!empty($existing_in_cart)) {
            $data['quantity'] = $existing_in_cart->quantity;
            $data['amount'] = $data['quantity'] * $data['product_price'];
        } else {
            $data['quantity'] = 1;
            $data['amount'] = $data['quantity'] * $data['product_price'];
            $data['created_by'] = Auth::guard('customer')->user()->customer_id;
            $insert_data = AddToCart::create($data);
            if ($insert_data->exists) {
                $msg = "success";
            } else {
                $msg = "failure";
            }
        }

        return $msg;
    }
}
