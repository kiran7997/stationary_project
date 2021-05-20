<?php

namespace App\Http\Controllers;
use App\customers;
use App\Aproducts;
use App\Inventories;
use App\Productvariation;
use App\Stocks;
use App\Units;
use App\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totals = [
            'catagories' => Categories::where(['deleted'=>0])->count(),
            'inventories' => Inventories::where(['deleted'=>0])->count(),
            'customers' => customers::where(['deleted'=>0])->count(),
            'Productvariation' => Productvariation::where(['deleted'=>0])->count(),
            'units' => Units::where(['deleted'=>0])->count(),
            'stocks' => Stocks::where(['deleted'=>0])->count(),
            'aproducts' => Aproducts::where(['deleted'=>0])->count(),
            ];
            $stock=stocks::select('stocks.product_id','stocks.item_quantity','aproducts.product_id','aproducts.product_name')
                ->leftjoin('aproducts', 'aproducts.product_id', '=', 'stocks.product_id')
                ->where(['stocks.deleted' => 0])->get();
           
                // $stock=stocks::select('stock.*','aproducts.product_id','aproducts.product_name')
                // ->leftjoin('aproducts', 'aproducts.product_id','aproducts.product_name' '=', 'stock.product_id')
                // ->where(['stock.deleted' => 0])->get();
                // $aproducts = Aproducts::where(['deleted' => 0])->get();
                 return view('home', compact('totals','stock'));
       // return view('home');
    }
    
}
 // // 'pens' = DB::table('aproducts')->where(['product_id'==1])->where(['deleted'=>0])->count(),
                // 'pens'=> stocks::where('product_id', 1)->pluck('item_quantity')->count(),
                // 'books'=> stocks::where('product_id', 2)->pluck('item_quantity')->count(),
                // 'color'=> stocks::where('product_id', 3)->pluck('item_quantity')->count(),
                // 'pencil'=> stocks::where('product_id', 4)->pluck('item_quantity')->count(),
                // 'drawing'=> stocks::where('product_id', 5)->pluck('item_quantity')->count(),
                // 'pens' => Aproducts::select 'item_quantity' where(['deleted'=>0])->count(),
                // 'inventories' => Inventories::where(['deleted'=>0])->count(),
                // 'customers' => customers::where(['deleted'=>0])->count(),
                // 'Productvariation' => Productvariation::where(['deleted'=>0])->count(),
                // 'units' => Units::where(['deleted'=>0])->count(),
                // 'stocks' => Stocks::where(['deleted'=>0])->count(),
                // 'aproducts' => Aproducts::where(['deleted'=>0])->count(),