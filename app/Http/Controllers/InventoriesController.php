<?php

namespace App\Http\Controllers;

use Auth;

use App\Aproducts;
use App\Inventeries;
use App\Suppliers;
use App\Stocks;
use DB;
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
                            ->select('inventeries.supplier_id', 'inventeries.inventory_id', 'inventeries.product_id',
                             'inventeries.quantity','inventeries.invntory_status', 'aproducts.product_name', 'inventeries.supplier_id', 'suppliers.supplier_companyName')
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
        if($req->invntory_status == 'add')
        {
            //echo "hello";exit;
        $stock = Stocks::select('product_id')->where('product_id','=', $req->product_id)->first();
      
        $count=Stocks::select('item_quantity')->where('product_id','=', $req->product_id)->value('item_quantity');
        //echo $count;exit;
        $co=$count+$req->quantity;
        //  $count=DB::table('stocks')->select('item_quantity')->where('product_id','=', $req->product_id)->first();
        //  echo $count;exit;
        
      //  $count=DB::table('stocks')->select('item_quantity')->where('product_id','=', $req->product_id)->first();
        //  echo $count;exit;
         
          //echo $co;exit;
       
        if($stock)
        {
          $stock=Stocks::where('product_id',$req->product_id)
            ->update(array('item_quantity' => intval($co)));
            
        //echo "hello";exit;
            //$count=$req->quantity;
            //echo $count;exit;
            // $total=DB::table('inventeries')->where([['product_id', '=', $req->product_id],['deleted', '=', 0]])
            // ->increment('quantity',$req->quantity);
            // $total=DB::table('stocks')->where('product_id', '=', $req->product_id)
            // ->increment('item_quantity',$co);

           //    echo $total;exit;
           
        }
        
       
        else
        {
           
           
            $data = array("product_id"=>$req->product_id,"item_quantity"=>$co,'updated_by'=>Auth::user()->id,
        'created_by'=>Auth::user()->id);
            Stocks::create($data);
            
        }
             
//------//
     }
     elseif($req->invntory_status == 'minus')
     {
         $quantity=Stocks::select('item_quantity')->where('product_id',$req->product_id)->value('item_quantity');
         // echo $quantity;exit;
         if($quantity==0)
         {
            return redirect('inventories')->with('success', 'Insufficient Stock ');
         }
         else
         {
        //  echo $quantity;exit;
        Stocks::select('item_quantity')->where('product_id', $req->product_id)->decrement('item_quantity',  $req->quantity);
         }
        //  $minus=DB::table('inventory')
        // Select value1 - (select value2 from AnyTable1) from AnyTable2
     }
     elseif($req->invntory_status == 'set')
     {
        $stock = Inventeries::select('quantity')->where('product_id','=', $req->product_id)->get();
        if($stock)
        {
            //$total=DB::table('inventeries')select('')->where('product_id','=',$req->product_id)->sum('quantity');
            Stocks::where('product_id',$req->product_id)
                ->update(array('item_quantity' => intval($req->quantity))); 
        }      
     }
        return redirect('inventories')->with('success', 'Inventory Added successfully');
    }

    public function edit($inventory_id)
    {
        $invens = Inventeries::select('inventory_id','supplier_id','product_id','quantity','invntory_status')->where('inventory_id','=',$inventory_id)->first();
        
        return response()->json($invens);
        //return redirect()->with('success', 'Inventory Updated successfully');
        
    }

    public function update(Request $req)
    {
        $invens = Inventeries::select('inventory_id','supplier_id','product_id','quantity','invntory_status')->first();

        $invens->supplier_id = $req->inventory_name;

        $invens->product_id = $req->product_id;
        $invens->quantity = $req->quantity;
        $invens->invntory_status = $req->invntory_status;
        $invens['updated_by'] = Auth::user()->id;
        $invens->save();
        if($req->invntory_status == 'add')
        {
            //echo "hello";exit;
        $stock = Stocks::select('product_id')->where('product_id','=', $req->product_id)->first();
      
        $count=Stocks::select('item_quantity')->where('product_id','=', $req->product_id)->value('item_quantity');
        //echo $count;exit;
        $co=$count+$req->quantity;
        //  $count=DB::table('stocks')->select('item_quantity')->where('product_id','=', $req->product_id)->first();
        //  echo $count;exit;
        
      //  $count=DB::table('stocks')->select('item_quantity')->where('product_id','=', $req->product_id)->first();
        //  echo $count;exit;
         
          //echo $co;exit;
       
          if($stock)
          {
            Stocks::where('product_id',$req->product_id)
              ->update(array('item_quantity' => intval($co)));
              
              //echo "hello";exit;
              //$count=$req->quantity;
              //echo $count;exit;
              // $total=DB::table('inventeries')->where([['product_id', '=', $req->product_id],['deleted', '=', 0]])
              // ->increment('quantity',$req->quantity);
              // $total=DB::table('stocks')->where('product_id', '=', $req->product_id)
              // ->increment('item_quantity',$co);
  
             //    echo $total;exit;
             
          }
          
         
          else
          {
             
             
              $data = array("product_id"=>$req->product_id,"item_quantity"=>$co,'updated_by'=>Auth::user()->id,
              'created_by'=>Auth::user()->id);
              Stocks::create($data);
              
          }
               
  
       }
       elseif($req->invntory_status == 'minus')
       {
           $quantity=Stocks::select('item_quantity')->where('product_id',$req->product_id)->value('item_quantity');
           // echo $quantity;exit;
           if($quantity==0)
           {
              return redirect('inventories')->with('success', 'Insufficient Stock ');
           }
           else
           {
          //  echo $quantity;exit;
          Stocks::select('item_quantity')->where('product_id', $req->product_id)->decrement('item_quantity',  $req->quantity);
           }
          //  $minus=DB::table('inventory')
          // Select value1 - (select value2 from AnyTable1) from AnyTable2
       }
       elseif($req->invntory_status == 'set')
       {
          $stock = Inventeries::select('quantity')->where('product_id','=', $req->product_id)->get();
          if($stock)
          {
              //$total=DB::table('inventeries')select('')->where('product_id','=',$req->product_id)->sum('quantity');
              Stocks::where('product_id',$req->product_id)
                  ->update(array('item_quantity' => intval($req->quantity))); 
          }      
       }
        return redirect('inventories')->with('success', 'Inventory Updated successfully');
        //return response()->json($invens);
    }
    
    public function destroy($inventory_id)
    {
        // $get=Inventeries::select('quantity','invntory_status')
        //                     ->where('inventory_id',$inventory_id)->get();
        // echo $get;exit;
        
        $invens = Inventeries::where('inventory_id', $inventory_id)
             ->update(['deleted' => 1]);
        
        // $check=Inventeries::select('inventory_id', 'invntory_status')
        //         ->where([['inventory_id', '=', $inventory_id],['invntory_status', '=', 'add']])->first();
        // dd($check) ;exit;
        //     //$stock = Stocks::where('product_id','=', $inventory_id)->firstz();
        //     $count=Inventeries::select('quantity')->where('inventory_id','=',$inventory_id)->value('quantity');
        //     $quantity=Stocks::select('item_quantity')->where('product_id','=', $inventory_id)->value('item_quantity');
        //     if($check)
        //     {
        //         //echo 'hii';exit;
        //         Stocks::where('product_id','=', $inventory_id)->decrement('item_quantity', $count);
        //         $invens = Inventeries::where('inventory_id', $inventory_id)
        //         ->update(['deleted' => 1]);
           
        //     }
            
        //     else
        //     {
        //         $co=$count+$quantity;   
        //         DB::table('stocks')->where('product_id',$inventory_id)
        //         ->update(array('item_quantity' => intval($co)));
                
        //     }
            
        return response()->json(['success' => 'Record has Been Deleted']);
    }   
    
    
}
