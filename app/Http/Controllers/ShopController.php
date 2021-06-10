<?php

namespace App\Http\Controllers;

use App\Aproducts;
use Illuminate\Http\Request;
use App\AddToCart;
use Auth;
use Carbon\Carbon;
use DB;
use Razorpay\Api\Api;
use Redirect;
use App\OrderItems;
use App\Orders;

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
        $add_to_cart = AddToCart::select('cart_id')->where(['product_id' => $product_id, 'customer_id' => Auth::guard('customer')->user()->customer_id, 'deleted' => 0])->first();
        return view('customer/layouts/details', ['product_data' => $product_data, 'add_to_cart_data' => $add_to_cart]);
    }

    public function cart()
    {
        $cart_data = $order_details = $price_details = $states = $days_7 = $districts =array();
        $cart_data = AddToCart::join('aproducts', 'aproducts.product_id', 'add_to_carts.product_id')
            ->leftjoin('customers', 'customers.customer_id', 'add_to_carts.customer_id')
            ->leftjoin('orders', 'orders.order_id', 'add_to_carts.order_id')
            ->select("add_to_carts.cart_id", "add_to_carts.order_id", "add_to_carts.order_item_id", "add_to_carts.product_id", "add_to_carts.customer_id", "add_to_carts.quantity", "add_to_carts.product_price", "add_to_carts.amount", "customers.customer_firstname", "customers.customer_lastname", "aproducts.product_name", "aproducts.image_url", "aproducts.description", "orders.firstname", "orders.lastname", "orders.email", "orders.phone_no", "orders.address_type", "orders.house_no", "orders.landmark", "orders.pincode", "orders.city", "orders.state", "orders.district")
            ->where(["add_to_carts.deleted" => 0, 'add_to_carts.customer_id' => Auth::guard('customer')->user()->customer_id])
            ->get();
        $order_details = $cart_data->first();
        if(!empty($order_details)){
            $districts = DB::table('district')->select('districtid', 'district_title')->where('state_id', $order_details->state)->get();
        }
        // dd($cart_data);
        $price_details = AddToCart::where(['deleted' => 0, 'customer_id' => Auth::guard('customer')->user()->customer_id])->sum('amount');
        $states = DB::table('state')->select('state_id', 'state_title')->get();
        $days_7 = date('D M d', strtotime(Carbon::parse(Carbon::now()->addDays(7))));
        $total_qty = AddToCart::where(['customer_id' => Auth::guard('customer')->user()->customer_id, 'deleted' => 0])->sum('quantity');
        return view('customer/layouts/checkout', ['cart_data' => $cart_data, 'days_7' => $days_7, 'states' => $states, 'price_details' => $price_details, 'order_details' => $order_details, 'districts' => $districts, 'total_qty' => $total_qty]);
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

    public function get_district(Request $request)
    {
        return DB::table('district')->select('districtid as id', 'district_title as title')->where('state_id', $request->state_id)->get();
    }

    public function updateQuantityInCart(Request $request){
        $get_product_price = AddToCart::select('product_price')->where('cart_id', $request->cart_id)->first();
        $product_price = $total_amopincodeunt = 0.00;
        if(!empty($get_product_price)){
            $product_price = $get_product_price->product_price;
        }
        $total_amount = $product_price * $request->item_quantity;
        $update_quantity_in_cart = AddToCart::where('cart_id', $request->cart_id)->update(array('quantity' => $request->item_quantity, 'amount' => $total_amount));
        return "success";
    }

    public function payment(Request $request)
    {        
        $input = $request->all();        
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } 
            catch (\Exception $e) 
            {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }            
        }
        
        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }

    public function myOrder(){
        $customer_id = Auth::guard('customer')->user()->customer_id;
        // $order = DB::table('orders')
        //        ->select('order_id','order_date','order_status')
        //        ->where('order_status','!=','return')
        //        ->where(['customer_id'=>$customer_id])
        //        ->get();
        $order_item_data = DB::table('order_items')
                        ->select('order_items.*','aproducts.image_url','orders.order_date','orders.order_id','orders.arrival_date')
                        ->leftjoin('aproducts','aproducts.product_id','order_items.product_id')
                        ->leftjoin('orders','orders.order_id','order_items.order_id')
                        ->where(['customer_id'=>$customer_id])
                        ->where('orders.payment_status', "yes")
                        ->whereNull('order_items.order_status')
                        ->get();
        return view('customer.my_order',compact('order_item_data'));
    }

    public function returnOrder($id){
        $data_customer = DB::table('order_items')->where(['order_item_id'=>$id])->update(['order_status' => 'return','return_date'=>date('Y-m-d')]);
        return redirect('my-order');
    }

    public function returnOrderList(){
        $customer_id = Auth::guard('customer')->user()->customer_id;
        $order_item_data = DB::table('order_items')
                        ->select('order_items.*','aproducts.image_url','orders.order_date','orders.order_id','orders.order_status')
                        ->leftjoin('aproducts','aproducts.product_id','order_items.product_id')
                        ->leftjoin('orders','orders.order_id','order_items.order_id')
                        ->where(['customer_id'=>$customer_id,'order_items.order_status'=>'return'])
                        // ->whereNull('order_items.order_status')
                        ->get();
        return view('customer.return_order',compact('order_item_data'));
    }

    public function remove_cart(Request $request){
        $final_amount = 0.00;
        $remove_cart = array();
        $remove_cart = AddToCart::where('cart_id', $request->cart_id)->update(array('deleted' => 1));
        if(!empty($request->order_item_id)){
            $order_item_total_amount = OrderItems::select('order_id', 'amount')->where('order_item_id', $request->order_item_id)->first();
            if(!empty($order_item_total_amount)){
                $order_total_amount = Orders::select('amount')->where('order_id', $order_item_total_amount->order_id)->first();
                $final_amount = $order_total_amount->amount - $order_item_total_amount->amount;
                $order_amount = Orders::where('order_id', $order_item_total_amount->order_id)->update(array('amount' => $final_amount));
            }
            $order_item_remove = OrderItems::where('order_item_id', $request->order_item_id)->update(array('deleted' => 1));
        }
        return $remove_cart;
    }
}
