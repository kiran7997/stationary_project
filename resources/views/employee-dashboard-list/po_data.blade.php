@extends('layouts.app')
@section('content')
<style>
     #example2 {
  box-sizing: border-box;
  width: 100%;
  height: 80px;
    
  border: 1px solid black;
}
td {
  border: 1px solid black;
  border-collapse: collapse;
}

</style>
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css ') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css ') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css ') }}">
<!-- END: Page CSS-->
<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            <div id="container">
                <div id="image" style="float:left;">
                    <img src="\logo\msb.png" alt="logo"  align="left"/>
                </div>
                <div id="texts" style="float:left; margin-left:30px"> 
                    <h3>MSB CORPORATION PRIVATE LIMITED </h3>
                    Add:  8 Anand OffBhavan, Off no.12, Mangal Wadi, Girgaum, Mumbai - 400004. <br>
                    Email: info@msbcorporation.com / Tel No.: 022 023825550 / GSTIN: 27AANCM3983C1Z7
                </div>
            </div>
            </div>
                <br>
                <center><h3>Purchase Order</h3></center>
            <table  id="example2"  >
               <tr>
                 <td style="padding:2.5px; width: 50%; border: 1px solid black;border-collapse: collapse;" rowspan="2">GST NO</td>
                 <td style="padding:2.5px; width: 50%;" rowspan="2"></td>
               </tr>
            </table>
               <br>
               <table  id="example2"  >
               <tr>
                    <th rowspan="2">To,</th>
                    <td style="padding:2.5px; width: 50%; " >P. O. No: MSBCPL /PO/2021-22/42</td>
                 </tr>
               <tr>
                    <td >DATE : <?php $date = date('Y-m-d', time());echo $date;?></td>
                   
                </tr>
             
               </table>
               <br>
               <?php if(count($order_item_data)>0){ ?>
                              @foreach($order_item_data as $item)
               <table style="width: 100%; margin-top: 10px; font-size: 15   px;" border="1px">
                         <tr align="center" >
                             <th style="padding:2.5px; width: 50%;" colspan="2" >DESCRIPTION</th>
                             <th style="padding:2.5px;" >HSN <br>(CODE)</th>
                             <th style="padding:2.5px;" >Quantity</th>
                             <th style="padding:2.5px;" >RATE <br>(INR)</th>
                             <th style="padding:2.5px;" >Total</th>
                            <!-- <th style="padding:2.5px;" colspan="2">Rate per Item</th>
                                <th style="padding:2.5px;" colspan="2">AMOUNT</th> -->
                         </tr>
                         <tr>
                            <td colspan="2" rowspan='4'>{{$item->product_name}}</td>
                                <td></td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>Rs.{{$item->amount}}</td>
                         </tr>
                         <tr>
                            <td colspan="3">Total</td>
                            <td>Rs.{{$item->amount}}</td>
                            <!-- <td></td>
                            <td></td> -->
                        </tr>
                        <tr>
                        <td>GST </td>
                        <td>18%</td>
                        <td></td>
                        <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="3">Grand Total</td>
                            <td>Rs.{{$item->amount}}</td>
                            <!-- <td></td>
                            <td></td> -->
                        </tr>
                        @endforeach
                 <?php } ?>
                </table><br>
                    <div style="float:left; margin-left:5px" >
                        <p>Payment Terms:</p>
                        <p>Delivary Terms:</p>
                        <p>Autho Sign </p>
                    </div>
                    <div style="float:right; margin-left:30px" >
                       <p><b>Delivery Address:</b> </p>
                       <p>Office no. 12, Mangal Wadi</p>
                       <p>Girgaum Mumbai 400004</p>
                       <p>Maharashtra</p>
                    </div>
                    <br><br><br><br><br>
                    <div >
                        <section class="invoice-preview-wrapper">
                        <div class="row invoice-preview">
                        <!-- Invoice Actions -->
                        <div class="col-xl-5 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <!-- <div class="card"> -->
                                <div class="card-body">
                                    <a href="{{url('generate-po/'.$id.'/download')}}" class="btn btn-success btn-block btn-download-invoice mb-75 " target="_blank">Download</a>
                                </div>
                            <!-- </div> -->
                        </div>
                        <!-- /Invoice Actions -->
                    </div>
                </section>


            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Page JS-->
@endsection