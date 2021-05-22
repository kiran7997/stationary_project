<?php

namespace App\Http\Controllers;

use Auth;
use App\Aproducts;
use App\Categories;
use App\Units;
use App\Productvariation;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:product');
    // }
    public function index()
    {
        // $products = Aproducts::where(['deleted' => 0])->get();
        $products = Aproducts::select('aproducts.*', 'categories.cat_name', 'units.unit_name', 'productvariations.variation_name')
            ->leftjoin('categories', 'categories.cat_id', '=', 'aproducts.product_id')
            ->leftjoin('units', 'units.unit_id', '=', 'aproducts.unit_id')
            ->leftjoin('productvariations', 'productvariations.variation_id', '=', 'aproducts.variation_id')
            ->where(['aproducts.deleted' => 0])->get();
        $categories = Categories::where(['deleted' => 0])->get();
        $units = Units::where(['deleted' => 0])->get();
        $product_variation = Productvariation::where(['deleted' => 0])->get();
        return view('product', compact('products', 'categories', 'units', 'product_variation'));
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

        // if ($req->file('image_url')) {
        //     $file = $req->file('image_url');
        //     $filename = rand(0, 999) . $file->getClientOriginalName();
        //     $destinationPath = public_path('product_images/');
        //     if (!file_exists($destinationPath)) {
        //         mkdir($destinationPath, 777, true);
        //         exec('chmod -R 777 ' . $destinationPath);
        //     } else {
        //         exec('chmod -R 777 ' . $destinationPath);
        //     }
        //     $file->move($destinationPath, $filename);
        //     $products->image_url = $filename;
        // }
        $product_img = array();
        $images = $req->file('image_url');

        foreach ($images as $image) {

            $filename = rand(0, 999) . $image->getClientOriginalName();
            $destinationPath = public_path('product_images/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
                exec('chmod -R 777 ' . $destinationPath);
            } else {
                exec('chmod -R 777 ' . $destinationPath);
            }
            $image->move($destinationPath, $filename);
            $product_img[] = 'product_images/' . $filename;
        }

        $pro_img = json_encode($product_img);
        $products->image_url = $pro_img;
        $products->description = $req->description;
        $products->base_price = $req->base_price;
        $products->code = $req->code;
        $products->taxable = $req->taxable;
        $products->save();
        
        return redirect('product')->with('success', ' Product Inserted  successfully');
        //return response()->json($products);
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

        // if ($req->file('image_url')) {
        //     $file = $req->file('image_url');
        //     $filename = rand(0, 999) . $file->getClientOriginalName();
        //     $destinationPath = public_path('product_images/');
        //     if (!file_exists($destinationPath)) {
        //         mkdir($destinationPath, 777, true);
        //         exec('chmod -R 777 ' . $destinationPath);
        //     } else {
        //         exec('chmod -R 777 ' . $destinationPath);
        //     }
        //     $file->move($destinationPath, $filename);
        //     $products->image_url = $filename;
        // } else {
        //     $products->image_url = $req->old_image;
        // }

        $product_img = array();
        if ($req->file('image_url')) {
            $images = $req->file('image_url');

            foreach ($images as $image) {

                $filename = rand(0, 999) . $image->getClientOriginalName();
                $destinationPath = public_path('product_images/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 777, true);
                    exec('chmod -R 777 ' . $destinationPath);
                } else {
                    exec('chmod -R 777 ' . $destinationPath);
                }
                $image->move($destinationPath, $filename);
                $product_img[] = 'product_images/' . $filename;
            }
        }

        if (!empty($req->old_image)) {
            foreach ($req->old_image as $old_img) {
                $product_img[] = $old_img;
            }
        }

        $pro_img = json_encode($product_img);
        $products->image_url = $pro_img;

        $products['updated_by'] = Auth::user()->id;

        $products->save();
        return redirect('product')->with('success', 'Product Updated successfully');
        //return response()->json($products);
    }
    public function destroy($product_id)
    {
        $products = Aproducts::where('product_id', $product_id)
            ->update(['deleted' => 1]);
        return response()->json(['success' => 'Record has Been Deleted']);
        //return redirect('product')->with('success', 'Product delete successfully');
    }
}
