@extends('layouts.app')
@section('title', 'Sales Wise Report')
@section('content')
@import url('https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css');
@import url('https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css');

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
                        <h2 class="content-header-title float-left mb-0">Sales Wise Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('salesWiseReoprt') }}">Sales Wise Report</a>
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
                                            <div class="form-group">
                                                <label for="state">Sales</label>
                                                <select class="form-control" name="sales" id="salesid" required>
							                <option value="">Select Sales Person</option>
							                @foreach($sales as $sal)
							                <option value="{{$sal->sales_person}}">{{$sal->firstname}}
				                			</option>
							                @endforeach
						                </select>
                                           
                                                
                                            </div>
                                        </div>
                                       
                                        
                                        </div>
					                    </div>
					                 </form>
                                     <div class=" col-12">
                                          <button  class="btn btn-primary" onclick="export_pdf() " style="float:right;margin-left :5px"> Print Report</button>
                                        <button  class="btn btn-primary" onclick="export_data()" style="float:right;">Excel Report</button>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <div id="printDiv" >
                            <table id="example" class="display nowrap stripe" style="width:100%;text-align:center">
                           
                            <thead>
                                    <tr>
									    <th>Sr.No</th>
                                        <th>Order Number</th>
                                        <th> City</th>
                                        <th>Firstname</th>
                                        <th>LastName</th>
                                         <th>Order Status</th>
									<!-- <th>Actions</th>  -->
								    </tr>
                                        </thead>
                                            <tbody id="appendData">
                                            @foreach($sales as $sale)
                                                <tr id="sid{{$sale->order_id}}">
                                                <td>{{ $no++ }}</td>
                                                <td>{{$sale->order_id}}</td>
                                                <td>{{ucwords($sale->city)}}</td>
                                                <td>{{$sale->firstname}} </td>
                                                <td>{{$sale->lastname}} </td>
                                                <td>{{ucwords($sale->order_status)}} </td>
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

$( "#salesid").change(function() 
  {
     var sales = $(this).val();
     var sr=1;
     var html="";
   // alert(sales);
    $.ajax({
        
                url: "{{url('salestable')}}",
                
                type: "POST",
                data: {_token:'{{ csrf_token() }}',id:sales},
                success:function(res){
                    $("#appendData").empty();
                    //alert(res);
                    $.each(res, function(key,val) {
                        var status=val.order_status;
                        //alert(status);
                        var status=status.charAt(0).toUpperCase() + status.slice(1)
                        //alert(status);
                        html+="<tr><td>"+sr+++"</td><td>"+val.order_id+"</td><td>"+val.city+"</td><td>"+val.firstname+"</td><td>"+val.lastname+"</td><td>"+status+"</td></tr>";
                       
                        // alert(val.order_id);
                        // alert(val.firstname);
           });$("#appendData").append(html);
                }
            });
        });
  } );

</script>
  



                                   
                              

	