<?php

namespace App\Http\Controllers;
use App\customers;
use App\Orders;
use DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        
        $orders= Orders::where(['deleted'=>0])->paginate(5);
        return view('invoice.invoice-list',compact('orders'));
    }

    public function previewinvoice($order_id)
    {
        
        $print=Orders::select('firstname','lastname','phone_no','email','house_no','landmark','city','state','pincode','product_name','tax_rate','order_id','price','quantity','subtotal','total')->where('order_id','=',$order_id)->first();
        $subtotal=$print['price'] * $print['quantity'];
        Orders::where('order_id',$order_id)->update(array(
        'subtotal'=>$subtotal,
));
        $total=$print['subtotal'] + $print['tax_rate'];
        Orders::where('order_id',$order_id)->update(array(
        'total'=>$total,
));
        return view('invoice.invoice-preview')->with('print',$print);
   
    }
    public function printinvoice($id)
    {
        $print=Orders::select('firstname','lastname','phone_no','email','house_no','landmark','city','state','pincode','product_name','tax_rate','order_id','price','quantity','subtotal','total')->where('order_id','=',$id)->first();
        return view('invoice.invoice-print',compact('print'));
    }
}
