@extends('layouts.app')
@section('title', 'Daily Order Report')
@section('content')
<style>
table {
    border-collapse: collapse;
    border: 1px solid black; 
}

td {
    padding: 20px; 
    border: 1px solid black; 
  
    
}
.home {
  display: inline-flex; /* 2. display flex to the rescue */
  flex-direction: row;
  margin-top:20px;
}


</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    


<!-- Responsive Datatable -->
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Daily Order Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('dailyOrderReport') }}">Daily Order Report</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section >
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                   
                                <form id="reportForm" name="reportForm" >
                                        @csrf
                                        <div class="home col-md-6">
                                               
                                        <label class="col-md-3"for="date"><h4><b>Date: </b></h4> </label>
                                     
   <input placeholder=" Select Your Date" class="form-control" type="text" onfocus="(this.type='date')"
   onblur="(this.type='text')" id="date">
                                           
                           
                                            
                                        </div>
                                       

                                   
					                    </div>
					                 </form>
                                     <div class=" col-12">
                                          <button  class="btn btn-primary" onclick="print() " style="float:right;margin-left :5px"> Print Report</button>
                                        <button  class="btn btn-primary" onclick="exportTableToExcel('example')" style="float:right;">Excel Report</button>
                                        </div>
                                </div>
                             
                           
                            <div id="printDiv" >
                            <table id="example" class="display nowrap stripe" style="width:100%;text-align:center;font-size:14px">
                           
                            <thead>
                         
                                            <tr style="font-weight: bold;">
                                            <td rowspan="1"><img src="\logo\msb.png" alt="logo"></td>
                                            <td colspan="8">Report</td>
                                            <td  rowspan="1" style="vertical-align:middle;">Date <br><?php $date = date('Y-m-d', time());
                                                echo $date;
                                            ?></td>
                                             
                                            <tr>
                                            <td colspan="10"> <b>Daily Order Report</b> </td>
                                            </tr>
                                            
                                            <tr style="font-weight: bold;">
									    <td>Sr.No</td>
                                        <td>Order Id</td>
                                        <td>Order Status</td>
                                        <td>Firstname</td>
                                        <td>LastName</td>
                                        <td>Phone No</td>
                                        <td>Product Name</td>
                                        <td>Product Quantity</td>
                                        <td>Price</td>
                                        <td>Subtotal</td>
                                         <!-- <td>Amount</td> -->
									<!-- <th>Actions</th>  -->
								    </tr>
                                    </tr>
                                        </thead>
                                            <tbody id="appendData">
                                            @foreach($daily_order as $order)
                                                <tr id="sid{{$order->order_id}}">
                                                <td>{{ $no++ }}</td>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{ucwords($order->order_status)}}</td>
                                                <td>{{ucwords($order->firstname)}} </td>
                                                <td>{{ucwords($order->lastname)}} </td>
                                                <td>{{$order->phone_no}} </td>
                                                <td>{{$order->product_name}}</td>
                                                <td>{{$order->product_quantity}}</td>
                                                <td>{{$order->price}} </td>
                                                <td>{{$order->subtotal}}</td>
                                                <!-- <td>{{$order->amount}} </td> -->
                                            @endforeach
                                     </tbody>
                                </table>    
                             </div >
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
              
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> 
<link href="https://code.jquery.com/jquery-3.5.1.js" rel="stylesheet" />
   
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script>

             

            

$(document).ready(function() {
  
  $('#example').DataTable( {
     
      "scrollX": true
  } );

  $(".delete").on("click", function () {
  return confirm('Are you sure you want to Delete?');
});

$( "#date").change(function() 
  {
     var date = $(this).val();
     var sr=1;
     var html="";
    //alert(date);
    $.ajax({
        
                url: "{{url('orderReport')}}",
                
                type: "POST",
                dataType:"json",
                data: {_token:'{{ csrf_token() }}',date:date},
                
                success:function(res){
              
                    
                    $("#appendData").empty();
                   
                    $.each(res, function(key,val) {
                        if(val.firstname==null){
                        val.firstname='';
                            }
                        if(val.lastname==null)
                        {
                            val.lastname='';
                        }
                        if(val.phone_no==null)
                        {
                            val.phone_no='';
                        }
                        if(val.order_status==null)
                        {
                            val.order_status='';
                        }
                        var status=val.order_status;
                        //alert(status);
                        var status=status.charAt(0).toUpperCase() + status.slice(1)
                        //alert(status);
                        html+="<tr><td>"+sr+++"</td><td>"+val.order_id+"</td><td>"+status+"</td><td>"+val.firstname+"</td><td>"+val.lastname+"</td><td>"+val.phone_no+
                        "</td><td>"+val.product_name+ "</td><td>"+val.quantity+ "</td><td>"+val.price+ "</td><td>"+val.subtotal+"</td></tr>";
                       
                        // alert(val.order_id);
                        // alert(val.firstname);
            });$("#appendData").append(html);
                }
            });
        });
  });
  function exportTableToExcel(example, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(example);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'Sales Wise Activity Report.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

    function print() {
        var divToPrint=document.getElementById("printDiv");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

</script>
  



                                   
                              

	