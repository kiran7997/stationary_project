@extends('layouts.app')
@section('title', 'Overall Report')
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
                        <h2 class="content-header-title float-left mb-0">Overall Inventory Data</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/item-inventory') }}">Inventory Data</a>
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

                        <form id="reportForm" name="reportForm" >
                                        @csrf
                               
                                        <div class="modal-body col-md-6 ">  
                                        <label class="required"for="product_name"><b>  Products Name</b> </label>
					                    <div class="form-group">
						                <select class="form-control" name="product_name" id="product_name" required>
							                <option value="">Select Product Name</option>
                                            <option value="all">All Data</option>
							                @foreach($products_data as $data)
                                            
							                <option value="{{$data->product_id}}">{{$data->product_name}}
                                        @endforeach
						                </select>
                                        </div>
                                        </div>
					                 </form>
                                     
                            <div class="card-header border-bottom">
                                <h4 class="card-title"></h4>
                                
                                </div>
                    
                            </div>
                            <div class=" col-12">
                                          <button  class="btn btn-primary" onclick="export_pdf() " style="float:right;margin-left:5px;"> Print Report</button>
                                        <button  class="btn btn-primary" onclick="exportTableToExcel('example')" style="float:right;">Excel Report</button>
                                        </div>
                                </div>
                            <div style="margin:20px;">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        <p>{{ $message }}</p>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                   <div id="printDiv">
                                <table id="example" class="display nowrap stripe" style="width:100%;text-align:center">
                                    <thead>
                                    <tr style="font-weight: bold;">
                                            <td rowspan="2"><img src="\logo\msb.png" alt="logo"></td>
                                            <td colspan="4" >Report</td>
                                            <td rowspan="2"> Date <br><?php $date = date('Y-m-d', time());
                                                echo $date;
                                            ?></td>
                                             
                                            <tr>
                                            <td colspan="4"> <b>Overall Inventory Data Report</b> </td>
                                            </tr>
                                        <tr style="font-weight: bold;">
                                            <td> Sr.No</td>
                                            <td>Company Name</td>
										    <td>Product Name</td>
										    <td>Quantity</td>
										    <td>Inventory Status</td>
										    <td>Created Date</td>
										</tr>
                                        </tr>
                                    </thead>
                                    <tbody id="appendData">
                                    
                                    </tbody>
                                </table>
                                </div>
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
$( "#product_name" ).change(function() 
  {
     var product_name = $(this).val();
     var sr=1;
     var html="";
    //alert(product_name);
    $.ajax({
                url: "{{url('overDataTable')}}",
                type: "POST",
                dataType:'json',
                data: {_token:'{{ csrf_token() }}',id:product_name},
                success:function(res){
                    $("#appendData").empty();
                        
                   
                   // alert(res);
                    $.each(res, function(key,val) {
                        if(val.supplier_companyName==null)
                        {
                            val.supplier_companyName='';
                        }
                        if(val.product_name==null)
                        {
                            val.product_name='';
                        }
                        if(val.quantity==null)
                        {
                            val.quantity='';
                        }
                        var date = val.created_at;
                         var date = date.split("T")[0];
                         var upper=val.invntory_status;
                        //  alert(upper);
                         var upper=upper.charAt(0).toUpperCase() + upper.slice(1)
                        //  alert(upper);
                       html+="<tr><td>"+sr+++"</td><td>"+val.supplier_companyName+"</td><td>"+val.product_name+"</td><td>"+val.quantity+"</td><td>"
                       +upper+"</td><td>"+date+"</td></td>";
                        // alert(val.firstname);
           });$("#appendData").append(html);
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