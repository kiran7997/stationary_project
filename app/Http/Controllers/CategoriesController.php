<?php

namespace App\Http\Controllers;
use Auth;
use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update'],'updateCategory']);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categories::where(['deleted'=>0])->paginate(5);
        return view('categories',compact('categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            
            'cat_name' => 'required',
            'cat_description'=>'required',
        ]);
        $categories=new Categories();
        $categories->cat_name=$request->cat_name;
        $categories->cat_description=$request->cat_description;
        $categories['created_by']=Auth::user()->id;
        $categories['updated_by']=Auth::user()->id;
        $categories->save();  
        //echo "<pre>".print_r($categories); exit;
        return response()->json($categories);
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function getCatagoryrById($id)
    {
       $categories=Categories::find($id);
        
        return response()->json($categories);
    }
    public function updateCategory(Request $request)
    {
        
        $categories=Categories::find($request->cat_id);
        $categories->cat_name=$request->cat_name;
        $categories->cat_description=$request->cat_description;
        $categories['created_by']=Auth::user()->id;
        $categories['updated_by']=Auth::user()->id;
        // echo "<pre>".print_r($categories); exit;
       $categories->save();  
        return response()->json($categories);

        
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
    public function deleteCategories($id)
    {
        $categories=Categories::where('cat_id',$id)
                      ->update(['deleted'=>1]);
                      
        return response()->json(['success'=>'Record has been deleted!']);
    
    }
}
