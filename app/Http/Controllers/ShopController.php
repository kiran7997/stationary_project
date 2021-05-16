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
    public function details($product_id)
    {
        $product_data=   Aproducts::find($product_id);
         //->where(['product_id'=>0])->get();
        return view ('details', ['product_data' => $product_data]);
       
     }
     public function add_to_cart(Request $req)
    {
       return "hello";
     }
     
    // // public function getProductId($product_id)
    // // {
    //     $productId= Aproducts::find($product_id);
    //     return view ('deatils', ['product_id' => $productId]);
    //    // return response()->json($productId);
    //   //  echo $productId;
    // }

    
}
