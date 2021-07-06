@extends('layouts.app')
@section('title', 'Daily Sales Wise Report')
@section('content')
<style>
table {
    border-collapse: collapse;
    border: 1px solid black; 
}

td {
    padding: 20px; 
    border: 1px solid black; 
    text-align: center;
}
</style>
<script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>

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
                        <h2 class="content-header-title float-left mb-0">Daily Sales Wise Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('dailySalesReport') }}">Daily Sales Wise Report</a>
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
                                        <div class="row">
                                        <div class="col-md-5 col-12 ml-5">
                                            <div class="form-group"><br>
                                            <label for="state"><b>Sales</b></label>
                                                <select class="form-control" name="sales" id="salesid" required>
							                        <option value="">Select Sales Person</option>
                                                    @foreach($salesname as $name)
							                           <option value="{{$name->id}}">{{$name->name}}
				                		              </option>
							                      @endforeach
						                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="form-group"><b></br>
                                                <label class="col-md-3"for="date"><b>Date:</h4> </label>
                                                 <input placeholder=" Select Your Date" class="form-control" type="text" onfocus="(this.type='date')"
                                                 onblur="(this.type='text')" id="date">
                                            </div>
                                        </div>
                                       
                                        </div>
                                    </div>
					            
                            </form>
                                     <div class=" col-12"id="hideDiv">
                                          <button  class="btn btn-primary" onclick="export_pdf() " style="float:right;margin-left:5px;"> Print Report</button>
                                        <button  class="btn btn-primary" onclick="exportTableToExcel('example') " style="float:right;">Excel Report</button>
                                        </div>
                                </div>
                            </div>
                            <br>
                            
                           
                            <div id="printDiv" >

                            <table id="example" class="display nowrap stripe" style="width:100%;text-align:center;font-size:14px">
                           
                            <thead>
                         
                                            <tr style="font-weight: bold;">
                                            <td rowspan="1"><img src="\logo\msb.png" alt="logo"></td>
                                            <td colspan="9">Report</td>
                                            <td  rowspan="1">Date <br><span id='currentDate'><?php $date = date('Y-m-d', time());
                                                echo $date;
                                            ?></span></td>
                                             
                                            <tr>
                                            <td colspan="11"> <b>Daily Order Report</b> </td>
                                            </tr>
                                            
                                            <tr style="font-weight: bold;">
									    <td>Sr.No</td>
                                        <td>Order Id</td>
                                        <td>Sales Person Name</td>
                                        <td style="word-wrap: break-word !important;">Order Status</td>
                                        <td>Firstname</td>
                                        <td>LastName</td>
                                        <td>Phone No</td>
                                        <td>Product Name</td>
                                        <td>Quantity</td>
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
                                                <td>{{$order->salename}}</td>
                                                <td style="word-wrap: break-word !important;">{{ucwords($order->order_status)}}</td>
                                                <td>{{ucwords($order->fname)}} </td>
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
                             <span id="showNotFOund">
                             </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
<script type = "text/javascript">
$(document).ready(function() {
  
  $('#example').DataTable( {
     
      "scrollX": true,
      "scrollY": true
  } );

  $(".delete").on("click", function () {
  return confirm('Are you sure you want to Delete?');
});

$( "#date").change(function() 
  {
    //   alert("OK FINE");
     var date = $(this).val();
    //  var sales = $(this).val();
    //  alert(date);
    //  alert(sales);
    var formData = new FormData(reportForm);
    var sales = formData.get('sales');
   // var date = formData.get('date');
    // alert(sales);
    // alert(date);
     $('#currentDate').empty();
     $('#currentDate').text(date);
     var sr=1;
     var html="";
    //alert(date);
    $.ajax({
        
                url: "{{url('salesDataReport')}}",
                
                type: "POST",
                dataType:"json",
                data: {_token:'{{ csrf_token() }}',date:date,sales:sales},
                
                success:function(res){
                    $('#appendData').empty();
                    if (res == '') {
                       // alert("hi");
                        $('#printDiv').hide();
                        $('#hideDiv').hide();
                        html="<center><h2>Data Not Found</h2></center>";
                        $("#showNotFOund").append(html);
                     } 
                     else
                     {
                   //alert("HELLO");  
                   $("#showNotFOund").hide();
                   $('#printDiv').show()
                        $('#hideDiv').show()
                    $.each(res, function(key,val) {
                        if(val.salename==null){ val.salename='';}
                        if(val.fname==null){ val.fname='';}
                        if(val.lastname==null){val.lastname='';}
                        if(val.phone_no==null){val.phone_no='';}
                        if(val.order_status==null){val.order_status='';}
                        if(val.product_name==null){val.product_name='';}
                        if(val.quantity==null){val.quantity='';}
                        if(val.price==null){val.price='';  }
                        if(val.subtotal==null){val.subtotal='';}
                        var status=val.order_status;
                        //alert(status);
                        var status=status.charAt(0).toUpperCase() + status.slice(1)
                        //alert(status);
                        
                        html+="<tr ><td>"+sr+++"</td><td>"+val.order_id+"</td><td>"+val.salename+"</td><td>"+status+"</td><td>"+val.fname+"</td><td>"+val.lastname+"</td><td>"+val.phone_no+
                        "</td><td>"+val.product_name+ "</td><td>"+val.quantity+ "</td><td>"+val.price+ "</td><td>"+val.subtotal+"</td></tr>";
                       
                        
                        // alert(val.order_id);
                        // alert(val.firstname);
            });$("#appendData").append(html);
                     }
                
                    
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
  
