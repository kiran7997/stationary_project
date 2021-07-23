<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            <div id="container">
            <div id="image" style="float:left;">
                    <img src="msb.png" alt="logo"  align="left"/>
                </div>
                <div style="margin-left:30px "> 
                    <h3>MSB CORPORATION PRIVATE LIMITED </h3>
                    Add:  8 Anand OffBhavan, Off no.12, Mangal Wadi, Girgaum, Mumbai - 400004. <br>
                    Email: info@msbcorporation.com / Tel No.: 022 023825550 / GSTIN: 27AANCM3983C1Z7
                </div>
            </div>
            </div>
                <br>
                <center><h3>Purchase Order</h3></center>
            <table style="box-sizing: border-box;width: 100%;height: 80px;border: 1px solid black;"  >
               <tr>
                 <td style="padding:2.5px; width: 50%; border: 1px solid black;border-collapse: collapse;" rowspan="2">GST NO</td>
                 <td style="padding:2.5px; width: 50%; border: 1px solid black;border-collapse: collapse;" rowspan="2"></td>
               </tr>
            </table>
               <br>
               <table style="box-sizing: border-box;width: 100%;height: 80px;border: 1px solid black;"   >
               <tr>
                    <th style="padding:2.5px;  width: 50%; border: 1px solid black;" rowspan="2">To,</th>
                    
                    <td style="padding:2.5px; width: 49%; height:3.5%; border: 1px solid black;" >P. O. No: MSBCPL /PO/2021-22/42</td>
                 </tr>
               <tr>
                    <td style="padding:2.5px;  width: 49% ;height:2.4%;border: 1px solid black;">DATE : <?php $date = date('Y-m-d', time());
                                                echo $date;
                                            ?></td>
                   
                </tr>
             
               </table>
               <br>
               <?php if(count($order_item_data)>0){ ?>
                              @foreach($order_item_data as $item)
               <table style="width: 100%; margin-top: 10px; font-size: 15px;" border="1px">
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
                            <td colspan="2" rowspan='4 '>{{$item->product_name}}</td>
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
                    
        </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Page JS-->
