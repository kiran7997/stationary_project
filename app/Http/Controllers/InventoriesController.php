<?php

namespace App\Http\Controllers;

use Auth;
use App\Aproducts;
use App\Inventeries;
use App\Suppliers;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:inventories');
    }
    public function index()
    {
        $suppliers= Suppliers::select('supplier_id', 'supplier_companyName')->where(['deleted'=>0])->get();
        $products_data=Aproducts::select('product_id','product_name')->where('deleted', 0)->get();
        $invens=Inventeries::leftjoin('aproducts', 'aproducts.product_id', 'inventeries.product_id')
                            ->leftjoin('suppliers', 'suppliers.supplier_id', 'inventeries.supplier_id')
                            ->select('inventeries.supplier_id', 'inventeries.inventory_id', 'inventeries.product_id', 'inventeries.quantity','inventeries.invntory_status', 'aproducts.product_name', 'inventeries.supplier_id', 'suppliers.supplier_companyName')
                            ->where(['inventeries.deleted' => 0])->get();
       
        // dd($invens);
        return view ('inventoeries',['products_data' => $products_data, 'invens' => $invens,'suppliers' => $suppliers]);
       
        // $invens = Inventories::where(['deleted' => 0])->paginate(5);

        // return view('inventoeries', compact('invens'));
    }
    public function store(Request $req)
    {
        $invens = new Inventeries();
        $invens->supplier_id = $req->inventory_name;
        $invens->product_id = $req->product_id;
        $invens->quantity = $req->quantity;
        $invens->invntory_status = $req->invntory_status;
        $invens['created_by'] = Auth::user()->id;
        $invens['updated_by'] = Auth::user()->id;
        $invens->save();
        return redirect('inventories')->with('success', 'Inventory Added successfully');
    }
    public function edit($inventory_id)
    {
        $invens = Inventories::find($inventory_id);
        return response()->json($invens);
        //return redirect()->with('success', 'Inventory Updated successfully');
        
    }
    public function update(Request $req)
    {
        $invens = Inventories::find($req->inventory_id);
        $invens->inventory_name = $req->inventory_name;
        // $invens->inventory_address = $req->inventory_address;
        // $invens->inventory_contact = $req->inventory_contact;
        // $invens->inventory_email = $req->inventory_email;
        $invens->product_id = $req->product_id;
        $invens->quantity = $req->quantity;
        $invens->invntory_status = $req->invntory_status;
        $invens['updated_by'] = Auth::user()->id;
        $invens->save();
        return redirect('inventories')->with('success', 'Inventory Updated successfully');
        //return response()->json($invens);
    }
    public function destroy($inventory_id)
    {
        $invens = Inventories::where('inventory_id', $inventory_id)
            ->update(['deleted' => 1]);

        return response()->json(['success' => 'Record has Been Deleted']);
    }
}
