<?php

namespace App\Http\Controllers;
use App\Aproducts;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $product_data= Aproducts::select('product_id','product_name', 'description','base_price','image_url')
        ->where(['deleted'=>0])->get();
        return view ('shop', ['product_data' => $product_data]);
       
    }
    public function details()
    {
        
        return view ('details', ['product_data' => $product_data]);
       
    }

 

    
}