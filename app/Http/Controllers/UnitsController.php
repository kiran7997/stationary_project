<?php

namespace App\Http\Controllers;
use Auth;
use App\Units;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
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
        //$units=Units::all();
        $units=Units::where(['deleted'=>0])->paginate(5);
        return view('units',compact('units'))->with('no', 1);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $units=new Units();
        $units->unit_name=$request->unit_name;
        $units->unit_description=$request->unit_description;
        $units['created_by']=Auth::user()->id;
        $units['updated_by']=Auth::user()->id;
        $units->save();  
        return redirect('units');     
        
    }

    public function getUnitsById($id)
    {
       $units=Units::find($id);
        return response()->json($units);
    }
    public function updateUnits(Request $request)
    {
        
        $units=Units::find($request->unit_id);
        $units->unit_name=$request->unit_name;
        $units->unit_description=$request->unit_description;
        $units->save();  
       // echo "<pre>";print_r($units);exit();
        return redirect('units');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteunits($id)
    {
        $units=units::where('unit_id',$id)
                      ->update(['deleted'=>1]);
                      
        return response()->json(['success'=>'Record has been deleted!']);
    
    }

}