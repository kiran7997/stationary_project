<?php

namespace App\Http\Controllers;
use Auth;
use App\Inventories;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    public function index()
    {
        $invens= Inventories::where(['deleted'=>0])->get();
       
        return view ('inventoeries',compact('invens'));
       
    }
     public function store(Request $req)
    {

        $invens=new Inventories();
        $invens->inventory_name = $req->inventory_name;
        $invens->inventory_address = $req->inventory_address;
        $invens->inventory_contact = $req->inventory_contact;
        $invens->inventory_email = $req->inventory_email;
        $invens->product_id = $req->product_id;
        $invens->quantity = $req->quantity;
        $invens->invntory_status = $req->invntory_status;
        $invens['created_by']=Auth::user()->id;
        $invens['updated_by']=Auth::user()->id;
        
        $invens->save();
          
        // return response()->json($invens);
        return redirect('inventories')->with('success', 'Inventory Added successfully');
    }
     public function edit($inventory_id)
    {
        $invens= Inventories::find($inventory_id);
        return response()->json($invens);
        //return redirect()->with('success', 'Inventory Updated successfully');
        
    }
    public function update(Request $req)
    {
        $invens = Inventories::find($req->inventory_id);
        $invens->inventory_name = $req->inventory_name;
        $invens->inventory_address = $req->inventory_address;
        $invens->inventory_contact = $req->inventory_contact;
        $invens->inventory_email = $req->inventory_email;
        $invens->product_id = $req->product_id;
        $invens->quantity = $req->quantity;
        $invens->invntory_status = $req->invntory_status;
        $invens['updated_by']=Auth::user()->id;
       
        $invens->save();
        echo "<pre>";print_r($invens);
          // return response()->json($invens);
          return redirect('inventories')->with('success', 'Inventory Updated successfully');
         
    }
    //    public function destroy($inventory_id)
    // {
    //     $invens=Inventories::where('inventory_id',$inventory_id)
    //                   ->update(['deleted'=>1]);
        
    // //    return response()->json(['success'=>'Record has Been Deleted']);
    //    return redirect()->route('inventories')
    //         ->with('success', 'Inventory deleted successfully');
    //     //return redirect('inventories')->with('success', 'Record has Been Deleted');
    // }
    public function destroy($inventory_id)
    {
        Inventories::where('inventory_id', $inventory_id)->update(['deleted' => 1]);
        return response()->json(['success'=>'Record has Been Deleted']);
    }
}