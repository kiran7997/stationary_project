<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
class ReportController extends Controller
{
    
    public function index(Request $requ)
    {
        
     
        $district = Orders::select('district.district_title','district.districtid','order_id','order_status','firstname','lastname','district')
        ->leftjoin('district', 'district.districtid', '=', 'district')
        ->where(['orders.deleted' => 0])->get();

        $dis = new Orders();
        $dis=$requ->district;
        //echo $dis;exit;
        $order = Orders::select('district.district_title','order_status','firstname','lastname','district','order_id')
        ->leftjoin('district', 'district.districtid', '=', 'district')
        ->where('district', $dis)->get();
        return view('distinctReport', ['district' => $district],['district' => $order])->with('no', 1);
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

    public function previewDistrict(Request $requ)
    {
        $dis = new Orders();
        $district=$requ->district;
        //echo $dis;exit;
        $print=Orders::select('firstname','lastname','order_id','order_status','district')
        ->leftjoin('district', 'district.districtid', '=', 'district')
        ->where('district', $district)->get();
       
        //echo "<pre>"; print_r($print);
        //print_r ($print);exit;
        return view('preview', ['print' => $print])->with('no', 1);
        //return view('district-preview')->with('print',$print);
   
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
    public function previewSales(Request $requ)
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

    
}
