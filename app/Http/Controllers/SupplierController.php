<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Suppliers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Suppliers::where(['deleted' => 0])->get();
        return view('suppliers', compact('suppliers'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $supplier = new Suppliers();
       
        $supplier->supplier_companyName = $request->supplier_companyName;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->supplier_contact = $request->supplier_contact;
        $supplier->supplier_email = $request->supplier_email;
        $supplier['created_by'] = Auth::user()->id;
        $supplier['updated_by'] = Auth::user()->id;
        $duplicate_companyName=DB::table('suppliers')->select('supplier_companyName')->where('supplier_companyName','=',$request->supplier_companyName)->first();
        if($duplicate_companyName){
             return redirect('supplier')->with('success', ' Comapany Already Exist');   
         }
        else
        {
        $supplier->save();  
        
       return redirect('supplier')->with('success', 'Suppliers Inserted successfully');
        }
       
    }

    public function edit($id)
    {
        $supplier = Suppliers::select('supplier_companyName','supplier_address','supplier_contact','supplier_email')
        ->where('supplier_id','=',$id)->first();
       // $supplier = Suppliers::find($id);
        //return view('editSupplier',['supplier' => $supplier]);

        return response()->json($supplier);
    }
    public function update(Request $request)
    {

        $supplier = Suppliers::select('supplier_companyName','supplier_address','supplier_contact','supplier_email')->first();
        $supplier->supplier_companyName = $request->supplier_companyName;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->supplier_contact = $request->supplier_contact;
        $supplier->supplier_email = $request->supplier_email;
        $supplier['updated_by'] = Auth::user()->id;
        $supplier->save();
        return redirect('supplier')->with('success', 'Suppliers Updated successfully');
       // return response()->json($suppliers);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::where('supplier_id', $id)
            ->update(['deleted' => 1]);

        return response()->json(['success' => 'Record has been deleted!']);
    }

}
