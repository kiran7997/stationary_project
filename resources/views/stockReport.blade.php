@extends('layouts.app')
@section('title', 'Stock Report')
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
                        <h2 class="content-header-title float-left mb-0">Stock Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('stockReport') }}">Stock Report</a>
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
                                        <div class="col-md-4 col-12">
                                            <div class="form-group"><br>
                                                <label for="state"><b>Products Name</b></label>
                                                <select class="form-control" name="product_name" id="product_name" required>
							                <option value="">Select Product Name</option>
                                            
							                @foreach($products_data as $data)
                                            
							                <option value="{{$data->product_id}}">{{$data->product_name}}
                                        @endforeach
						                </select>
						                </select>
                                           
                                                
                                            </div>
                                        </div>
                                       
                                        
                                        </div>
					                    
					                 </form>
                                     <div class=" col-12" id="hideDiv">
                                          <button  class="btn btn-primary" onclick="print() " style="float:right;margin-left :5px"> Print Report</button>
                                        <button  class="btn btn-primary" onclick="exportTableToExcel('example')" style="float:right;">Excel Report</button>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <div id="printDiv" >
                            <table id="example" class="display nowrap stripe" style="width:100%;text-align:center;">
                           
                            <thead>
                         
                                            <tr style="font-weight: bold;">
                                            <td rowspan="1"><img src="\logo\msb.png" alt="logo"></td>
                                            <td colspan="2" >Report</td>
                                            <td rowspan="1">Date <br><?php $date = date('Y-m-d', time());
                                                echo $date;
                                            ?></td>
                                             
                                            <tr>
                                            <td colspan="6"> <b>Stock Report</b> </td>
                                            </tr>
                                            
                                    <tr style="font-weight: bold;">
									    <td>Sr.No</td>
                                        
                                        <td>Stock Id</td> 
                                        <td>Product         Name</td>
                                        <td>Quantity</td>
                                        
									
								    </tr>
                                    </tr>
                                        </thead>
                                            <tbody id="appendData">
                                           
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

$( "#product_name").change(function() 
  {
     var product_name = $(this).val();
     var sr=1;
     var html="";
   // alert(product_name);
    $.ajax({
        
                url: "{{url('stockDataReport')}}",
                
                type: "POST",
                data: {_token:'{{ csrf_token() }}',product_name:product_name},
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
                    
                   
                    //alert(res);
                    $.each(res, function(key,val) {
                        if(val.product_name==null){
                        val.product_name='';
                            }
                        if(val.quantity==null)
                        {
                            val.quantity='';
                        }
                        
                        html+="<tr><td>"+sr+++"</td><td>"+val.stock_id+"</td><td>"+val.product_name+"</td><td>"+val.item_quantity+"</td></tr>";
                        // alert(val.order_id);
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
  



                                   
                              

	