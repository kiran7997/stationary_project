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
        
       // echo "<pre>";print_r($print);exit();
 $print=Orders::find($order_id);
       $subtotal=$print['price'] * $print['quantity'];
       DB::table('orders')->where('order_id',$order_id)->update(array(
        'subtotal'=>$subtotal,
));
$total=$print['subtotal'] + $print['tax_rate'];
       DB::table('orders')->where('order_id',$order_id)->update(array(
        'total'=>$total,
));
       
      
        // $print = DB::table('orders')->update(array('subtotal'=>$s));
        return view('invoice.invoice-preview')->with('print',$print);
   
    }
    public function printinvoice($id)
    {
        $print=Orders::find($id);

        
        return view('invoice.invoice-print',compact('print'));
    }
}
