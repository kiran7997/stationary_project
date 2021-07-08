@extends('layouts.app')
@section('title', 'Product Wise Report')
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
                        <h2 class="content-header-title float-left mb-0">Product Wise Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/productWiseReport') }}"> Product Wise Data Report</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="responsive-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                        
                                        @csrf
                                        <div class="row" style="margin-left:100px">
                                        <div class="col-md-5 col-12 ">
                                        <form id="reportForm" name="reportForm" >
                                            <div class="form-group"><br>
                                            <label for="products"><b>All Products</b></label>
                                            <select class="form-control" name="product_name" id="product_name" >
							                    <option value="">Select Product Name</option>
                                                <option value="all">All Data</option>
							                        @foreach($products_data as $data)
                                                   <option value="{{$data->product_id}}">{{$data->product_name}}
                                                    @endforeach
						                    </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-5 col-12">
                                            <div class="form-group"><br>
                                            <label for="date"><b> Staring Date:</h4> </label>
                                                 <input placeholder=" Select Your Date" class="form-control" type="text" onfocus="(this.type='date')"
                                                 onblur="(this.type='text')" id="date1">
                                            </div>
                                        </div>
                                        </div>
                                     <div class="row " style="margin-left:100px">
                                        <div class=" col-md-5 col-12">
                                            <div class="form-group"><b></br>
                                                <label for="date"><b>Ending Date:</h4> </label>
                                                 <input placeholder=" Select Your Date" class="form-control" type="text" onfocus="(this.type='date')"
                                                 onblur="(this.type='text')" id="date2">
                                            </div>
                                        </div>
                                        <div class=" col-md-5 col-12"  style="margin-top:25px">
                                        <center>
                                     <div class="form-group"><b></br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            </center>
 
                                        </div>
                                        </div>
                                    
                                </div>
                                
                           </div>
                        </div>
                     </form>
                </div>
                <div class=" col-12" id="hideDiv">
                                      <button  class="btn btn-primary" onclick="export_pdf() " style="float:right;margin-left:5px;"> Print Report</button>
                                      <button  class="btn btn-primary" onclick="exportTableToExcel('example')" style="float:right;">Excel Report</button>
                  </div>
            </div>
                           
                     <div id="printDiv">
                                <table id="example" class="display nowrap stripe" style="width:100%;text-align:center">
                                    <thead>
                                    <tr style="font-weight: bold;">
                                            <td rowspan="2"><img src="\logo\msb.png" alt="logo"></td>
                                            <td colspan="7" >Report</td>
                                            <td rowspan="2"> Date <br><span id='currentDate'><?php $date = date('Y-m-d', time());
                                                echo $date;
                                            ?></span></td>
                                             
                                            <tr>
                                            <td colspan="7"> <b>Product Data Report</b> </td>
                                            </tr>
                                        <tr style="font-weight: bold;">
                                            <td> Sr.No</td>
                                            <td> Order Id</td>
										    <td>Product Name</td>
                                            <td>Product Type</td>
                                            <td>Price</td>
										    <td>Quantity</td>
                                            <td> Order Status</td>
										    <td> Subtotal</td>
										   <td>Amount</td>
										</tr>
                                        </tr>   
                                    </thead>
                                    <tbody id="appendData">
                                    
                                    </tbody>
                                </table>
                                </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script>
  $(document).ready(function() {
    // $('#example').DataTable();
    $('#example').DataTable( {
        // "scrollY": 200,
        "scrollX": true
    } );

    $(".delete").on("click", function () {
    return confirm('Are you sure you want to Delete?');
});
$("#reportForm").submit(function(e)
{
    e.preventDefault();
    
    let product = $("#product_name").val();
    let start = $("#date1").val();
    let end = $("#date2").val();
    let _token = $("input[name=_token]").val();
    
     var sr=1;
     var html="";
    
    $.ajax({
                url: "{{url('productDataReport')}}",
                type: "POST",
                dataType:'json',
                data: {
                    product:product,
                    start:start,
                    end:end,
                    _token:_token

                },
                success:function(res){
                    $("#appendData").empty();
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
                   $('#printDiv').show();
                   $('#hideDiv').show();
                    $.each(res, function(key,val) {
                        if(val.product_name==null){ val.product_name='';}
                        if(val.product_type==null){ val.product_type='';}
                        if(val.price==null){val.price='';}
                        if(val.quantity==null){val.quantity='';}
                        if(val.order_status==null){val.order_status='';}
                        if(val.subtotal==null){val.subtotal='';}
                        if(val.amount==null){val.amount='';}
                        // alert(val.amount);
                        var status=val.order_status;
                        //alert(status);
                        var status=status.charAt(0).toUpperCase() + status.slice(1)
                       html+="<tr><td>"+sr+++"</td><td>"+val.order_id+"</td><td>"+val.product_name+"</td><td>"+val.product_type+"</td><td>"+val.price+"</td><td>"
                       +val.quantity+"</td><td>"+status+"</td></td>"+val.subtotal+"</td><td>"+val.amount+"</td><td>";
                        // alert(val.firstname);
           });$("#appendData").append(html);
                }
                }
            });
        });
    } );
    function exportTableToExcel(example, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(example);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'Over All Inventory Report.xls';
    
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
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection