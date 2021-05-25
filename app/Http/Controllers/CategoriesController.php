<?php

namespace App\Http\Controllers;
use Auth;
use DB;
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
       
        $this->middleware('permission:catagories');
        
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
        $categories=Categories::where(['deleted'=>0])->paginate(5);
        return view('categories',compact('categories'))->with('no', 1);;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'cat_name' => 'required|unique:cat_name',
            'cat_description'=>'required',
        ]);
        $categories=new Categories();
        $name=$categories->cat_name=$request->cat_name;
        $categories->cat_description=$request->cat_description;
        $categories['created_by']=Auth::user()->id;
        $categories['updated_by']=Auth::user()->id;
        $duplicate_category=DB::table('categories')->select('cat_name')->where('cat_name','=',$name)->first();
        
        if($duplicate_category){
             return redirect('catagories')->with('success', ' Item Already Exist');   
         }
        else{
        $categories->save();  
        return redirect('catagories')->with('success', ' Record Inserted Successfully');     
        }
           
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
       $categories->save();  
       return redirect('catagories')->with('success', ' Record Updated Successfully'); 

        
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