<?php

namespace App\Http\Controllers;
use Auth;
use App\Aproducts;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Aproducts::where(['deleted' => 0])->paginate(5);
        return view('product', compact('products'));
    }
    public function store(Request $req)
    {
        // $req->validate([
        //     'file' => 'required|image_url|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   ]);
        $products = new Aproducts();
        $products->product_name = $req->product_name;
        $products->cat_id = $req->cat_id;
        $products->unit_id = $req->unit_id;
        $products->variation_id = $req->variation_id;

        if ($req->file('image_url')) {
            $file = $req->file('image_url');
            $filename = rand(0, 999) . $file->getClientOriginalName();
            $destinationPath = public_path('product_images/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
                exec('chmod -R 777 ' . $destinationPath);
            } else {
                exec('chmod -R 777 ' . $destinationPath);
            }
            $file->move($destinationPath, $filename);
            $products->image_url = $filename;
        }
        $products->description = $req->description;
        $products->base_price = $req->base_price;
        $products->code = $req->code;
        $products->taxable = $req->taxable;
        // echo "<pre>";
        // print_r($products);
        // exit;
        $products['created_by']=Auth::user()->id;
        $products['updated_by']=Auth::user()->id;
        
        $products->save();
        $products->image_url = $destinationPath . '/' . $filename; //this for only after insert view image set
        return response()->json($products);
    }
    public function edit($product_id)
    {
        $products = Aproducts::find($product_id);
        return response()->json($products);
    }
    public function update(Request $req)
    {
        $products = Aproducts::find($req->product_id);
        $products->product_name = $req->product_name;
        $products->cat_id = $req->cat_id;
        $products->unit_id = $req->unit_id;
        $products->variation_id = $req->variation_id;
        // $products->image_url = $req->image_url;
        $products->description = $req->description;
        $products->base_price = $req->base_price;
        $products->code = $req->code;
        $products->taxable = $req->taxable;

        if ($req->file('image_url')) {
            $file = $req->file('image_url');
            $filename = rand(0, 999) . $file->getClientOriginalName();
            $destinationPath = public_path('product_images/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
                exec('chmod -R 777 ' . $destinationPath);
            } else {
                exec('chmod -R 777 ' . $destinationPath);
            }
            $file->move($destinationPath, $filename);
            $products->image_url = $filename;
        } else {
            $products->image_url = $req->old_image;
        }
        
        $products['updated_by']=Auth::user()->id;
        
        $products->save();
        return response()->json($products);
    }
    public function destroy($product_id)
    {
        $products = Aproducts::where('product_id', $product_id)
            ->update(['deleted' => 1]);
        return response()->json(['success' => 'Record has Been Deleted']);
    }
}