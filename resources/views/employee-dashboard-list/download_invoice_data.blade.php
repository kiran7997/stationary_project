<div class="card invoice-preview-card">
    <body style="height: 100%;width: 100%;">
        <div class="card-body invoice-padding pb-0">
            <div style="width: 100%; height: 5%;"><center><b><h3>INVOICE</h3></b></center></div>
                <div style="width: 100%;height: 50%;">
                    <div style="width: 50%;height: 35%;box-sizing: border-box;border: 1px solid black;float: left;">
                            <h4 style="margin-left:30px">  MSB Corporation Private Limited</h4>
                            <p style="margin-left:30px">Off No12, Mangal Wadi,</p>
                            <p style="margin-left:30px">Girgaum, Mumbai: 400 004.</p>
                            <p style="margin-left:30px">GSTIN/UIN: 27AANCM3983C1Z7</p>
                            <p style="margin-left:30px">State Name : Maharashtra, Code : 27</p>
                            <p style="margin-left:30px">E-Mail : info@msbcorporation.com</p>
                    </div>  
                    
                    <div style="width: 49%;height: 51%;box-sizing: border-box;border: 1px solid black;float: right;text-align: center; ">
                    <?php if(count($order_item_data)>0){ ?>
                @foreach($order_item_data as $item)
                    <div class="table-responsive">
                    <table class="table table-bordered"  style="font-size: 15px;width: 100%;border-collapse:none;margin: top 15px;" >
                    <thead>
                        <tr>
                        <td style="padding: 10px;">Invoice Rs <br> {{$item->amount}}</td>
                        <td style="padding: 10px;">Dated  <br>{{$item->order_date}}</td>
                        </tr>
                        <tr>
                        <td style="padding: 10px;">Delivary Note <br></td>
                        <td style="padding: 10px;">Mode/Terms of Payment <br> {{$item->payment_status}}</td>
                        </tr>
                        <tr>
                        <td style="padding: 10px;">Supplier’s Ref <br> {{$item->sales_person}}</td>
                        <td style="padding: 10px;">Other Reference(s) <br></td>
                        </tr>
                        <tr>
                        <td style="padding: 10px;">Buyer’s Order No. <br></td>
                        <td style="padding: 10px;">Dated <br></td>
                        </tr> 
                        <tr>
                        <td style="padding: 10px;">Despatch Document No. <br></td>
                        <td style="padding: 10px;">Delivery Note Date <br></td>
                        </tr>   
                        <tr>
                       <td >Despatched through <br></td>
                       <td style="padding: 10px;">Destination <br>{{$item->address_type}}</td>
                      </tr>
                      <tr>
                      <td style=" padding: 10px;">Terms of Delivery <br></td>
                      </tr>
                    </thead>
                </table>
             </div>            
                    </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div style="width: 50%;height: 15%;box-sizing: border-box;border: 1px solid black;float: left;">
                <p style="margin-left:30px">Buyer</p>
                     <p><b style="margin-left:30px">{{$item->firstname}} &nbsp;{{$item->lastname}}</b></p>
                     <p style="margin-left:30px">PAN/IT No :</p>
                     <p style="margin-left:30px">State Name : Maharashtra, Code : 27</p>
                    </div>
                    @endforeach
                    <?php } ?>
                </div>
                    <!-- <div style="width: 50%;height: 35%;box-sizing: border-box;border: 1px solid black;float: right;text-align: center; ">2</div>
                
                </div> -->
        </body>
        <hr class="invoice-spacing" />
        <table  style="width: 100%; margin-top: 10px; font-size: 15px;" border="1px">
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
                 <br><br>
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
<!--                <p class="card-text text-nowrap">
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
                    <tbody>
               </table>
                                   
                <hr class="invoice-spacing" />
                <table style="width: 100%; margin-top: 10px; font-size: 15px;" border="1px">
                <tr style="text-align: center;">
                <th style="padding:1.5px; width: 50%;" colspan="2">HSN/SAC</th>
                <th>Taxable Value</th>
                <th colspan="2" >Central Tax</th>
                <th colspan="2" >State Tax</th>
                <th>Total</th><br><br>
                <hr class="invoice-spacing" />
                </tr>
                <tr>
                <td colspan="2"></td>
                <td></td>
                <td style="width:10%"><b >Rate</b></td>
                <td style="width:10%"><b>Amount</b></td>
                <td style="width:10%"><b>Rate</b></td>
                <td style="width:10%"><b>Amount</b></td>
                
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
                <td  colspan="2" >Total</td>
                <td>{{$item->tax_amount}}</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td>Rs.{{$item->amount}}</td>
                @endforeach
            <?php } ?>
          
        </tbody>
    </table>
</div>

       
        <table style="width: 100%;border-collapse:none;">
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
        <p style="margin-left:420px"> for MSB Corporation Private Limited </p>
        <p style="margin-left:600px">Authorised Signatory</p></b>
        </td>
        </tr>
        </table>

      
    </div>
</div>