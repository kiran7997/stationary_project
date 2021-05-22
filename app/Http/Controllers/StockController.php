<?php

namespace App\Http\Controllers;

use Auth;
use App\Stocks;
use App\Aproducts;
use Illuminate\Http\Request;
class StockController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:stock');
    // }
   public function index()
    {
        $stocks = stocks::where(['deleted' => 0])->get();

        $products_data=Aproducts::select('product_id','product_name')->where('deleted', 0)->get();
        $stocks=Stocks::select('stocks.stock_id', 'stocks.product_id', 'stocks.item_quantity', 'aproducts.product_name')
                ->leftjoin('aproducts', 'aproducts.product_id', 'stocks.product_id')
                ->where(['stocks.deleted' => 0])->get();
                // dd($products_data);
       // $stocks= stocks::where(['deleted'=>0])->get();
    //    echo '<pre>';
    //    echo $stocks;
    //    echo '</pre>';
    //    exit;
        return view ('stock', ['products_data' => $products_data, 'stocks' => $stocks]);

     //   return view('stock', compact('stocks'));
    }
     
    public function store(Request $req)
    {
        
        $stock=new Stocks();
        $stock->product_id = $req->product_id;
        $stock->item_quantity = $req->item_quantity;
        $stock['created_by']=Auth::user()->id;
        $stock['updated_by']=Auth::user()->id;
    

        $stock->save();
       // return response()->json($stock);
       return redirect('stock')->with('success', 'Stock Inserted successfully');
    }
    public function edit($stock_id)
    {
        
        $stock = Stocks::find($stock_id);
        return response()->json($stock);
    }
    public function update(Request $req)
    {
        $stock = Stocks::find($req->stock_id);
        $stock->product_id=$req->product_id;
        $stock->item_quantity=$req->item_quantity;
        $stock['updated_by'] = Auth::user()->id;
        $stock->save();
        return redirect('stock')->with('success', 'Stock Updated successfully');
    }
      
    public function destroy($stock_id)
    {
        $stock = Stocks::where('stock_id', $stock_id)
            ->update(['deleted' => 1]);

        return response()->json(['success' => 'Record has Been Deleted']);
    }

}