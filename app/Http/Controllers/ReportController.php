<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Inventeries;
use App\Suppliers;
use App\Aproducts;
use DB;
class ReportController extends Controller
{
    
    public function index(Request $requ)
    {
        $district = Orders::select('district.district_title','district.districtid','order_id','order_status','firstname','lastname','district')
        ->leftjoin('district', 'district.districtid', '=', 'district')
        ->where(['orders.deleted' => 0])->get();

        $state = DB::table('state')->select('state_id','state_title')
        
        ->where(['state.status' => 'Active'])->get();

        //echo $state;exit;
        $dis = new Orders();
        $dis=$requ->district;
        //echo $dis;exit;
        $order = Orders::select('district.district_title','order_status','firstname','lastname','district','order_id')
        ->leftjoin('district', 'district.districtid', '=', 'district')
        ->where('district', $dis)->get();
        return view('distinctReport', ['district' => $district],['state' => $state])->with('no', 1);
    }    

    public function districtTable(Request $req)
    {
        $dis = new Orders();
        $dis=$req->id;
        //echo $dis;exit;
        $order = Orders::select('district.district_title','order_status','firstname','lastname','district','order_id')
        ->leftjoin('district', 'district.districtid', '=', 'district')
        ->where('district', $dis)->get();
       
        // echo $order;exit;
        // if you try dd($students), you should see it in Network > Preview
            //echo "<pre>"; print_r($order);
       
            return response()->json($order);
            
       // return view('distinctReport', ['district' => $order])->with('no', 1);
    }

    
    public function salesReport(Request $requ)
    {
        
     
        $sales = Orders::select('users.id','users.firstname','users.lastname','sales_person','order_id','order_status','users.city')
        ->leftjoin('users', 'users.id', '=', 'sales_person')
        ->where(['orders.deleted' => 0])->get();

        $sale = new Orders();
        $sale=$requ->sales;
        //echo $dis;exit;
        $salesPerson = Orders::select('users.id','users.firstname','users.lastname','sales_person','order_id','order_status','users.city')
        ->leftjoin('users', 'users.id', '=', 'sales_person')
        ->where('id', $sale)->get();
        return view('salesPersonReport', ['sales' => $sales],['sales' => $salesPerson])->with('no', 1);
    }    

    public function salesTable(Request $req)
    {
        $sale = new Orders();
        $sale=$req->id;
       // echo $sale;exit;
        $salesPerson = Orders::select('users.id','users.firstname','users.lastname','users.city','sales_person','order_id','order_status')
        ->leftjoin('users', 'users.id', '=', 'sales_person')
        ->where('id', $sale)->get();

        // echo $order;exit;
        // if you try dd($students), you should see it in Network > Preview
            //echo "<pre>"; print_r($order);
            return response()->json($salesPerson);
       // return view('distinctReport', ['district' => $order])->with('no', 1);
    }
    public function printSales(Request $requ)
    {
        $dis = new Orders();
        $sales=$requ->sales;
        //echo $sales;exit;
        $salesPerson = Orders::select('users.id','users.firstname','users.lastname','sales_person','order_id','order_status','users.city')
        ->leftjoin('users', 'users.id', '=', 'sales_person')
        ->where('id', $sales)->get();
       
        //echo "<pre>"; print_r($print);
        //print_r ($print);exit;
        return view('sales_preview', ['print' => $salesPerson])->with('no', 1);
        //return view('district-preview')->with('print',$print);
   
    }
    public function overallInventoryData(Request $req)
    {
        // $report = Inventory::select('aproducts.product_name','aproducts.product_id','order_id','order_status','firstname','lastname','district')
        // ->leftjoin('district', 'district.districtid', '=', 'district')
        // ->where(['orders.deleted' => 0])->get();
        
        $products_data = Aproducts::select('product_id', 'product_name')->where('deleted', 0)->get();
        return view('overallData', ['products_data' => $products_data]); 
        //$products_data = Inventeries::select('product_id')
    }
    public function table(Request $req)
    {
        $product=new Aproducts();
        $product=$req->id;
        // echo $product;exit;
        //     $suppliers = Suppliers::select('supplier_id', 'supplier_companyName')->where(['deleted' => 0])->get();
        //     $products_data = Aproducts::select('product_id', 'product_name')->where('deleted', 0)->get();
        //     $data = Inventeries :: select('quantity','invntory_status','inventeries.created_at')
        //     ->leftjoin('suppliers','product_id','=','product_id')->where('product_id','=',$product)->get();
        //     echo $data;exit;

        if($product == 'all')
        {
            $suppliers = Suppliers::select('supplier_id', 'supplier_companyName')->where(['deleted' => 0])->get();
            $products_data = Aproducts::select('product_id', 'product_name')->where('deleted', 0)->get();
            $invens = Inventeries::leftjoin('aproducts', 'aproducts.product_id', 'inventeries.product_id')
                ->leftjoin('suppliers', 'suppliers.supplier_id', 'inventeries.supplier_id')
                ->select(
                    'inventeries.supplier_id',
                    'inventeries.inventory_id',
                    'inventeries.product_id',
                    'inventeries.quantity',
                    'inventeries.invntory_status',
                    'aproducts.product_name',
                    'inventeries.supplier_id',
                    'inventeries.created_at',
                    'suppliers.supplier_companyName'
                )
                ->where(['inventeries.deleted' => 0])->orderby('inventeries.inventory_id', 'DESC')->get();
                return response()->json($invens);
            // dd($invens);
            return view('overallData', ['products_data' => $products_data, 'invens' => $invens, 'suppliers' => $suppliers]);
        }   
        else
        {
            $suppliers = Suppliers::select('supplier_id', 'supplier_companyName')->where(['deleted' => 0])->get();
            $products_data = Aproducts::select('product_id', 'product_name')->where('deleted', 0)->get();
            $invens = Inventeries::leftjoin('aproducts', 'aproducts.product_id', 'inventeries.product_id','inventeries.created_at')
                ->leftjoin('suppliers', 'suppliers.supplier_id', 'inventeries.supplier_id')
                ->select(
                    'inventeries.supplier_id',
                    'inventeries.inventory_id',
                    'inventeries.product_id',
                    'inventeries.quantity',
                    'inventeries.invntory_status',
                    'aproducts.product_name',
                    'inventeries.supplier_id',
                    'inventeries.created_at',
                    'suppliers.supplier_companyName'
                )->where('aproducts.product_id','=',$product)->get();
            return response()->json($invens);
        }
        // dd($invens);
    }

    public function viewOrders(Request $request){
        $order_data = Orders::select('order_id', 'order_status', 'order_date', 'firstname', 'lastname', 'phone_no', 'address_type', 'house_no', 'city', 'zip', 'district')->where(['deleted' => 0])->get();

        return view('view-orders', compact('order_data'));
    }
}
