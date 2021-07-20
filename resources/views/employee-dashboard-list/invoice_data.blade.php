@extends('layouts.app')
@section('content')
<style>
   #example2 {
  box-sizing: border-box;
  width: 50%;
  height: 250px;
  padding: 30px;  
  border: 1px solid black;
}
  
.tdd{
     border:1px solid black ;
   
     padding: 30px; 
}
#example1 {
  box-sizing: border-box;
  width: 50%;
  height: 250px;
  border: 1px solid black;
}
.col-8{
width: 12.5%;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 100px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */

</style>
<!-- BEGIN: Page CSS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            </div>
            <div class="content-body">
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-12">
                            <!-- <div class="card invoice-preview-card"> -->
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <h3><center>INVOICE</center></h3>
                                        <div class="row">
                                            <div class="column" id="example2">
                                                <h4>  MSB Corporation Private Limited</h4>
                                                <p>Off No12, Mangal Wadi,</p>
                                                <p>Girgaum, Mumbai: 400 004.</p>
                                                <p>GSTIN/UIN: 27AANCM3983C1Z7</p>
                                                <p>State Name : Maharashtra, Code : 27</p>
                                                <p>E-Mail : info@msbcorporation.com</p>
                                            </div>
                                            <div class="column" id="example1">
                                            <?php if(count($order_item_data)>0){ ?>
                                            @foreach($order_item_data as $item)
                                            <table class="table table-bordered" style="font-size: 13px;" >
                                                <thead>
                                                <tr>
                                                     <td>Invoice Rs <br> {{$item->amount}}</td>
                                                     <td>Dated  <br>{{$item->order_date}}</td>
                                                </tr>
                                                <tr>
                                                     <td>Delivary Note</td>
                                                     <td>Mode/Terms of Payment <br> {{$item->payment_status}}</td>
                                                </tr>
                                                <tr>
                                                     <td>Supplier’s Ref <br> {{$item->sales_person}}</td>
                                                     <td>Other Reference(s)</td>
                                                </tr>
                                                <tr>
                                                     <td>Buyer’s Order No.</td>
                                                     <td>Dated</td>
                                                </tr> 
                                                <tr>
                                                    <td>Despatch Document No.</td>
                                                    <td>Delivery Note Date</td>
                                                </tr>   
                                                <tr>
                                                    <td>Despatched through</td>
                                                    <td>Destination {{$item->address_type}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Terms of Delivery</td>
                                                </tr>
                                             </thead>
                                           
                                            
                                             </table>
                                             
                                            </div>
                                                <div class="w-100"></div>
                                                <div class="column"id="example2">
                                                <p>Buyer</p>
                                                <p><b>{{$item->firstname}} &nbsp;{{$item->lastname}}</b></p>
                                                <p>PAN/IT No :</p>
                                                <p>State Name : Maharashtra, Code : 27</p>
                                            </div>
                                            @endforeach
                                            <?php } ?>
                                                <div id="example2"></div>
                                            </div>
                                      
                                </div>   
                            <!-- </div>     -->
                        </div>  
                                <!-- <hr class="invoice-spacing" /> -->

                                <!-- Address and Contact starts -->
                                <!-- <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <h6 class="mb-2">Invoice To:</h6>
                                            <h6 class="mb-25">Thomas shelby</h6>
                                            <p class="card-text mb-25">Shelby Company Limited</p>
                                            <p class="card-text mb-25">Small Heath, B10 0HF, UK</p>
                                            <p class="card-text mb-25">718-986-6062</p>
                                            <p class="card-text mb-0">peakyFBlinders@gmail.com</p>
                                        </div>
                                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-1">Total Due:</td>
                                                        <td><span class="font-weight-bold">$12,110.55</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Bank name:</td>
                                                        <td>American Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Country:</td>
                                                        <td>United States</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">IBAN:</td>
                                                        <td>ETD95476213874685</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">SWIFT code:</td>
                                                        <td>BR91905</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Address and Contact ends -->

                                <!-- Invoice Description starts -->
                                <br><br>
                                <div >
                                    <table class=" table table-bordered column tdd"   >
                                        <thead >
                                            <tr>
                                                <th >Sr.No</th>
                                                <th >Description of Goods</th>
                                                <th >HSN/SAC</th>
                                                <th >GST Rate</th>
                                                <th >Quantity</th>
                                                <th >Rate</th>
                                                <th >Per</th>
                                                <th >Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($order_item_data)>0){ ?>
                                            @foreach($order_item_data as $item)
                                            <tr>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">1</span>
                                                </td>
                                                <td class="py-1">
                                                    <p class="card-text font-weight-bold mb-25">{{$item->product_name}}</p>
                                                    Less : CGST @6% OUTWARD
                                                    SGST @6% OUTWARD
                                                    Rounded Off
<!--                                                    <p class="card-text text-nowrap">
                                                        Developed a full stack native app using React Native, Bootstrap & Python
                                                    </p>-->
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">HSN</span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">GST</span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">{{$item->quantity}}</span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">{{$item->tax_rate}}</span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">{{$item->tax_amount}}</span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">Rs.{{$item->amount}}</span>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="2" style="text-align: right;">Total</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$item->quantity}}</td>
                                                <td></td>
                                                <td></td>
                                                <td>Rs.{{$item->amount}}</td>
                                            </tr>
                                            <tr>
                                                <tr> <td colspan="8">Amount Chargeable (in words) <br><b>INR Eleven Only</b></td> </tr>
                                            </tr>
                                            <tr style="text-align: center;">
                                                
                                                <th colspan="2">HSN/SAC</th>
                                                <th >Taxable Value</th>
                                                <th colspan="2">Central Tax</th>
                                               <th colspan="2" >State Tax</th>
                                               <th>Total</th>

                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td></td>
                                                <td><b>Rate</b></td>
                                                <td><b>Amount</b></td>
                                                
                                               
                                                <td><b>Rate</b></td>
                                                <td><b>Amount</b></td>
                                                <td></td>
                                            </tr>
                                            <tr style="text-align: right;">
                                                <td colspan="2">HSN/SAC</td>
                                                <td>{{$item->tax_amount}}</td>
                                                <td colspan="2"></td>
                                                <td colspan="2"></td>
                                                <td>Rs.{{$item->amount}}</td>
                                            </tr>
                                            <tr style="text-align: right;">
                                                <td  colspan="2" >Toatl</td>
                                                <td>{{$item->tax_amount}}</td>
                                                <td colspan="2"></td>
                                                <td colspan="2"></td>

                                               
                                                <td>Rs.{{$item->amount}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8">Tax Amount (in words) : <b>INR One and Twenty paise Only</b> </td>
                                            </tr>
                                            <tr >
                                            <td style=" margin-right:500px" colspan="8"> <b style=" margin-left:430px">Company’s Bank Details</b><br>
                                            <p style=" margin-left:450px">Bank Name: <b> Axis Bank Ltd A/C 921020002017808 </b><br>
                                            A/c No. : <b>921020002017808</b><br>
                                            Branch & IFS Code : <b>Charni Road Br. & UTIB0002274</b></p>
                                            </td>
                                            </tr>
                                            <tr id="col-8">
                                                <td colspan="8">
                                                <p id="tdd">
                                                Company’s PAN: <b> AANCM3983C</b><br>
                                               <u> Declaration </u><br>
                                                We declare that this invoice shows the actual price of <br> the
                                                goods described and that all particulars are true an
                                                 <b style="margin-left:120px"> for MSB Corporation Private Limited </p>
                                                        <p style="margin-left:600px">Authorised Signatory</p></b>
                                                </td>
                                            </tr>
                                          
                                            @endforeach
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                
                        <!-- Invoice Actions -->
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
                                        Send Invoice
                                    </button> -->
                                    <a href="{{ url('generate-invoice/'.$id.'/download') }}" target="_blank" class="btn btn-success btn-block btn-download-invoice mb-75">Download</a>
                                    <!-- <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-print.html" target="_blank">
                                        Print
                                    </a>
                                    <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-edit.html"> Edit </a>
                                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment-sidebar">
                                        Add Payment
                                    </button> -->
                                </div>
                            </div>
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