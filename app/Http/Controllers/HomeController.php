<?php

namespace App\Http\Controllers;

use App\customers;
use App\Aproducts;
use App\Inventeries;

use App\Productvariation;
use App\Stocks;
use App\Units;
use App\Categories;
use App\Orders;
use DB;
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
            'catagories' => Categories::where(['deleted' => 0])->count(),
            'Inventeries' => Inventeries::where(['deleted' => 0])->count(),
            'customers' => customers::where(['deleted' => 0])->count(),
            'Productvariation' => Productvariation::where(['deleted' => 0])->count(),
            'units' => Units::where(['deleted' => 0])->count(),
            'stocks' => Stocks::where(['deleted' => 0])->count(),
            'aproducts' => Aproducts::where(['deleted' => 0])->count(),
        ];

        $stock = array();
        $temp = array();
        $stock_data = stocks::select('stocks.product_id', 'stocks.item_quantity', 'aproducts.product_id', 'aproducts.product_name')
            ->leftjoin('aproducts', 'aproducts.product_id', '=', 'stocks.product_id')
            ->where(['stocks.deleted' => 0])->get();
        //this foreach for the overall stock data
        // foreach ($stock_data as $st) {
        //     $stock['name'][] =  $st->product_name;
        //     $stock['qty'][] =  $st->item_quantity;
        //     // $stock['data'][] = $stock;
        // }
        // for ($i = 0; $i < count($stock['name']); $i++) {
        //     $temp['data'][$i][] = $stock['name'][$i];
        //     $temp['data'][$i][] = $stock['qty'][$i];
        // }


        $date = date('Y-m');
        //district wise order 
        $order_data = Orders::select('district.district_title', DB::raw('count(*) as count'))
            ->leftjoin('district', 'district.districtid', '=', 'district')
            ->where('order_date', 'LIKE', '%' . $date . '%')->groupBy('district')->get();
        $dist = array();
        foreach ($order_data as $key => $od) {
            $dist['data'][$key][] =  $od->district_title;
            $dist['data'][$key][] =  $od->count;
        }
        //sales person wise order 
        $salespersondata = Orders::select('users.firstname', DB::raw('count(*) as count'))
            ->join('users', 'users.id', '=', 'sales_person')
            ->where('order_date', 'LIKE', '%' . $date . '%')->groupBy('sales_person')->get();
        $sale_temp = array();
        foreach ($salespersondata as $key => $od) {
            $sale_temp['data'][$key][] =  $od->firstname;
            $sale_temp['data'][$key][] =  $od->count;
        }
        return view('home', ['totals' => $totals, 'stock' => $temp, 'distwiseorder' => $dist, 'saleswiseorder' => $sale_temp]);
    }
}
