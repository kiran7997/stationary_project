<?php

namespace App\Http\Controllers;
use App\Productvariation;
use Auth;
use Illuminate\Http\Request;

class ProductsVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product_variation');
        // $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:product-edit', ['only' => ['edit', 'update'],'updateCategory']);
        // $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Productvariation::where(['deleted'=>0])->paginate(5);
        return view('productvariations',compact('products'))->with('no', 1);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $products=new Productvariation();
        $products->variation_name=$request->variation_name;
        $products->variation_abbrevation=$request->variation_abbrevation;
        $products->add_on_price=$request->add_on_price;
        $products['created_by']=Auth::user()->id;
        $products['updated_by']=Auth::user()->id;
        $products->save();  
        return redirect('product_variation')->with('success', ' Record Inserted Successfully');   
           
    }

    public function getProductvById($id)
    {
       $products=Productvariation::find($id);
        
        return response()->json($products);
    }
    public function updateProductv(Request $request)
    {
        
        $products=Productvariation::find($request->variation_id);
       
        $products->variation_name=$request->variation_name;
        $products->variation_abbrevation=$request->variation_abbrevation;
        $products->add_on_price=$request->add_on_price;
       $products->save();  
       return redirect('product_variation')->with('success', ' Record Updated Successfully'); 
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteProductv($id)
    {
        $products=Productvariation::where('variation_id',$id)
                      ->update(['deleted'=>1]);
                      
        return response()->json(['success'=>'Record has been deleted!']);
    
    }

}