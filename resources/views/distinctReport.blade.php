@extends('layouts.app')
@section('title', 'District Wise Report')
@section('content')
@import url('https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css');
@import url('https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css');
<!-- 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

     -->


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
                        <h2 class="content-header-title float-left mb-0">Distinct Wise Report</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('distinctReport') }}">Distinct Wise Report</a>
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
                                        <div class="modal-body">    
                                        <label class="required"for="district">Select District </label>
					                    <div class="form-group">
						                <select class="form-control" name="district" id="district"   required>
							                <option value="">Select District</option>
							                @foreach($district as $dis)
							                <option value="{{$dis->districtid}}">{{$dis->district_title}}
				                			</option>
							                @endforeach
						                </select>
                                        <br>
                                          <button  class="btn btn-primary" onclick="export_pdf()"> Print Report</button>
                                        <button  class="btn btn-primary" onclick="export_data()">Excel Report</button>
                                     
                        
					                    </div>
					                 </form>
                                </div>
                            <!-- </div> -->
                            <div id="printDiv" >
                            <table id="example" class="display nowrap stripe" style="width:100%;text-align:center">
                           
                            <thead>
                                    <tr>
									    <th>Sr.No</th>
									    <th>Order Number</th>
                                        <th>Distinct Name</th>
                                        <th>Firstname</th>
                                        <th>LastName</th>
                                        <th>Order Status</th>
									<!-- <th>Actions</th>  -->
								    </tr>
                                        </thead>
                                            <tbody id="appendData">
                                            @foreach($district as $dis)
                                            <tr id="sid{{$dis->order_id}}">
                                            <td>{{ $no++ }}</td>
									        <td>{{$dis->order_id}}</td>
									        <td>{{$dis->district_title}}</td>
                                            <td>{{$dis->firstname}} </td>
                                            <td>{{$dis->lastname}} </td>
                                            <td>{{$dis->order_status}} </td>
                                             @endforeach
                                     </tbody>
                                </table>
                                </div >
                               
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


function export_pdf() {
    $('.dropdown2').hide();
    var doc = new jsPDF();
    // var doc = new jsPDF('p', 'mm', [297, 210]);
    // new jsPDF('l', 'mm', [297, 210]);
    doc.addHTML($('#printDiv'), 15, 15, {
        'background': '#fff',
        // 'size': 'A4 landscape',
        // 'height':'297 px',
        // 'width':'210 px',
        'border': '2px solid white',
        // 'margin-left': '100px',
    }, function() {
        doc.save('District Wise Activity Report.pdf');
    });
}

//   $.get("announcements.php?selected="+selected, function(data){
//       $('.result').html(data);

//     $($(dropDown).parents('tr')[0]).find('input.price').val(data);

    
function export_data() {
    alert('hi');
    console.log($('#printDiv').html());
    let file = new Blob([$('#printDiv').html()], {
        type: "application/vnd.ms-excel"
    });
    let url = URL.createObjectURL(file);
    let a = $("<a/>", {
        href: url,
        download: "District Wise Activity Report.xls"
    }).appendTo("body").get(0).click();
    e.preventDefault();
}

             

    $(document).ready(function() {
    // $('#example').DataTable();
    $('#example').DataTable( {
        // "scrollY": 200,
        "scrollX": true
    } );

    $(".delete").on("click", function () {
    return confirm('Are you sure you want to Delete?');
});
$( "#district" ).change(function() 
  {
     var district = $(this).val();
     var sr=1;
     var html="";
    alert(district);
    $.ajax({
                url: "{{url('districttable')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',id:district},
                success:function(res){
                    $("#appendData").empty();
                    //alert(res);
                    $.each(res, function(key,val) {
                        html+="<tr><td>"+sr+"</td><td>"+val.order_id+"</td><td>"+val.district_title+"</td><td>"+val.firstname+"</td><td>"+val.lastname+"</td><td>"+val.order_status+"</td></tr>";
                       
                        // alert(val.order_id);
                        // alert(val.firstname);
           });$("#appendData").append(html);
                }
            });
        });
    } );


// $(document).ready(function() {
//     $('#example').DataTable({
//           dom: 'Bfrtip',
//           buttons: [
//               'copy', 'excel', 'pdf', 'print'
//           ],
//           select: true,
//           });
// $( "#district" ).change(function() 
//   {
//      var district = $(this).val();
//      var sr=1;
//      var html="";
//     alert(district);
//     $.ajax({
//                 url: "{{url('districttable')}}",
//                 type: "POST",
//                 data: {_token:'{{ csrf_token() }}',id:district},
//                 success:function(res){
//                     $("#appendData").empty();
//                     //alert(res);
//                     $.each(res, function(key,val) {
//                         html+="<tr><td>"+sr+"</td><td>"+val.order_id+"</td><td>"+val.district_title+"</td><td>"+val.firstname+"</td><td>"+val.lastname+"</td><td>"+val.order_status+"</td></tr>";
                       
//                         // alert(val.order_id);
//                         // alert(val.firstname);
//            });$("#appendData").append(html);
//                 }
//             });
//         });

//     });


</script>  

