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
        
        $salesname=DB::table('users')->select('id','firstname','lastname','name')->where(['users.deleted'=>0])->get();
        // $sales = Orders::select('users.id','users.firstname','users.lastname','sales_person','order_id','order_status','users.city')
        // ->leftjoin('users', 'users.id', '=', 'sales_person')
        // ->where(['orders.deleted' => 0])->get();

        $sale = new Orders();
        $sale=$requ->sales;
        //echo $dis;exit;
        $salesPerson = Orders::select('users.id','users.firstname','users.lastname','sales_person','order_id','order_status','users.city')
        ->leftjoin('users', 'users.id', '=', 'sales_person')
        ->where('id', $sale)->get();
        return view('salesPersonReport', ['sales' => $salesname],['salesPerson' => $salesPerson])->with('no', 1);
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
    public function dailyOrder(Request $req)
    {
        $date = date('Y-m-d', time());
       
       
        $daily_order=Orders::select('order_id', 'order_status', 'order_date', 'firstname', 'lastname', 'phone_no')
        ->where('order_date','=',$date)->where(['deleted' => 0])->get();
        return view('dailyOrderReport',['daily_order'=>$daily_order])->with('no', 1);
    }
    public function dailyOrderReport(Request $req)
    {
        $date = new Orders();
        $date=$req->date; 
        
       // echo $date;
        $daily_order=Orders::select('orders.order_id', 'orders.order_status', 'order_date', 'firstname', 'lastname', 'phone_no','orders.amount','order_items.product_name','order_items.price','order_items.quantity','order_items.subtotal')
        ->leftjoin('order_items','order_items.order_id','=' ,'orders.order_id')
        ->where('order_date','=',$date)->where(['orders.deleted' => 0])->get();
       // echo $daily_order;exit;
       // return view('dailyOrderReport',['daily_order'=>$daily_order])->with('no', 1);
        return response()->json($daily_order);
    }
    public function dailySales(Request $req)
    {
        $salesname=DB::table('users')->select('id','firstname','lastname','name')->where(['users.deleted'=>0])->get();
        //print_r( $salesname);exit;
         
        // $sales = Orders::select('users.id','users.firstname','users.lastname','sales_person','order_id','order_status','users.city')
        // ->leftjoin('users', 'users.id', '=', 'sales_person')
        // ->where(['orders.deleted' => 0])->get();

        $date = date('Y-m-d', time());
        $daily_order=Orders::select('order_id', 'order_status', 'order_date', 'firstname', 'lastname', 'phone_no')
        ->where('order_date','=',$date)->where(['deleted' => 0])->get();
        return view('dailySalesReport',['daily_order'=>$daily_order], ['salesname' => $salesname])->with('no', 1);
    }
    public function dailySalesReport(Request $req)
    {
        
        //echo $salesname;exit;
        $salesname=DB::table('users')->select('id','firstname','lastname','name')->where(['users.deleted'=>0])->get();
        $date = new Orders();
        $date=$req->date; 
        $sales=$req->sales;
        // echo $date;
        // echo $sales;exit;
        $salesPerson = Orders::select('users.id','orders.firstname as fname','orders.lastname','sales_person','users.name as salename','orders.order_id','orders.order_status','users.city','order_items.product_name','order_items.price','order_items.quantity','order_items.subtotal')
        ->leftjoin('users', 'users.id', '=', 'sales_person')
        ->leftjoin('order_items','order_items.order_id','=' ,'orders.order_id')
        ->where('id', $sales)->where('order_date','=',$date)->where(['orders.deleted' => 0])->get();
        echo $salesPerson;exit;
        // $salesPerson= Orders::select('orders.order_id','orders.firstname','orders.lastname','sales_person','orders.order_status','order_items.product_name','order_items.price','order_items.quantity','order_items.subtotal')
        // ->leftjoin('order_items','order_items.order_id','=' ,'orders.order_id')
        // ->leftjoin('users', 'users.id', '=', $sales)
        // ->where('order_date','=',$date)->where(['orders.deleted' => 0])->get();
        return response()->json($salesPerson);
     
    }
    
}
