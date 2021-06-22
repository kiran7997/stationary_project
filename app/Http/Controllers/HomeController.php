<?php

namespace App\Http\Controllers;

use App\customers;
use App\Aproducts;
use App\Inventeries;

use App\Productvariation;
use App\Stocks;
use App\Units;
use App\Categories;
use App\OrderItems;
use App\Orders;
use App\Suppliers;
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
            'customers' => customers::where(['deleted' => 0])->count(),
            'aproducts' => Aproducts::where(['deleted' => 0])->count(),
            'order_return' => OrderItems::where(['deleted' => 0, 'order_status' => 'return'])->count(),
            'supplier' => Suppliers::where(['deleted' => 0])->count(),
            'revenue' => Orders::where(['deleted' => 0])->sum('amount'),
            'order_count' => Orders::where(['deleted' => 0, 'order_status' => 'order'])->count(),
            'order_process' => Orders::where(['deleted' => 0, 'order_status' => 'process'])->count(),
            'order_close' => Orders::where(['deleted' => 0, 'order_status' => 'close'])->count(),
        ];

        $temp = array();
        $date = date('Y-m');
        //district wise order 
        $order_data = Orders::select('district.district_title', DB::raw('count(*) as count'))
            ->leftjoin('district', 'district.districtid', 'district')->groupBy('district')->get();
        $dist = array();
        foreach ($order_data as $key => $od) {
            $dist['data'][$key][] =  $od->district_title;
            $dist['data'][$key][] =  $od->count;
        }
        // dd($dist);
        //sales person wise order 
        $salespersondata = Orders::select('users.firstname', DB::raw('count(*) as count'))
            ->join('users', 'users.id', 'sales_person')->groupBy('sales_person')->get();
        $sale_temp = array();
        foreach ($salespersondata as $key => $od) {
            $sale_temp['data'][$key][] =  $od->firstname;
            $sale_temp['data'][$key][] =  $od->count;
        }
        return view('home', ['totals' => $totals, 'stock' => $temp, 'distwiseorder' => $dist, 'saleswiseorder' => $sale_temp]);
    }
}
