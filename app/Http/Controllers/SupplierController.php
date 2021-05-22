<?php

namespace App\Http\Controllers;
use Auth;
use App\Suppliers;
use DB; 
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

        $suppliers = new Suppliers();
        $suppliers->supplier_companyName = $request->supplier_companyName;
        $suppliers->supplier_address = $request->supplier_address;
        $suppliers->supplier_contact = $request->supplier_contact;
        $suppliers->supplier_email = $request->supplier_email;
        $suppliers['created_by'] = Auth::user()->id;
        $suppliers['updated_by'] = Auth::user()->id;
        $suppliers->save();
        return redirect('supplier')->with('success', 'Suppliers Inserted successfully');
       
       
    }

    public function edit($id)
    {
        $supplier = DB::table('suppliers')->where('supplier_id', $id)->first();

        return response()->json($supplier);
    }
    public function update(Request $request)
    {

        $supplier = Suppliers::find($request->supplier_id);
        $supplier->supplier_companyName = $request->supplier_companyName;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->supplier_contact = $request->supplier_contact;
        $supplier->supplier_email = $request->supplier_email;
        $supplier['updated_by'] = Auth::user()->id;
        $supplier->save();
        return redirect('suppliers')->with('success', 'Suppliers Updated successfully');
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
        $suppliers = Suppliers::where('supplier_id', $id)
            ->update(['deleted' => 1]);

        return response()->json(['success' => 'Record has been deleted!']);
    }

}
