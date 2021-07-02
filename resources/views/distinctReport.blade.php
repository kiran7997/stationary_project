@extends('layouts.app')
@section('title', 'District Wise Report')
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
                                        <div class="row">
                                        <div class="col-md-5 col-12 ml-5">
                                            <div class="form-group"><br>
                                            <label for="state"><b>State</b></label>
                                                <select class="form-control " name="state" id="state"
                                                    required>
                                                    <option value="">Select State</option>
                                                    @foreach($state as $sta)
                                                    <option value="{{$sta->state_id}}">{{$sta->state_title}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-12">
                                            <div class="form-group"><br>
                                            <label for="state"><b>District</b></label>
                                               <select class=" form-control" name="district" id="district" required>
                                                    <option value="">Select District</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                       
                                        </div>
                                    </div>
					            
                            </form>
                                     <div class=" col-12">
                                          <button  class="btn btn-primary" onclick="export_data() " style="float:right;margin-left:5px;"> Print Report</button>
                                        <button  class="btn btn-primary" onclick="exportTableToExcel('example') " style="float:right;">Excel Report</button>
                                        </div>
                                </div>
                            </div>
                            <br>
                        <div id="printDiv" >
                            <table id="example" class="display nowrap stripe" style="width:100%;text-align:center">
                           
                           
                                           <thead>
                                            <tr style="font-weight: bold;">
                                            <td rowspan="2"><img src="\logo\msb.png" alt="logo"></td>
                                            <td colspan="4" >Report</td>
                                            <td rowspan="2">Date <br><?php $date = date('Y-m-d', time());
                                                echo $date;
                                            ?></td>
                                            <tr>
                                            <td colspan="4"><b>District  Wise Data Report</b></td>
                                            </tr>
                                            <tr style="font-weight: bold;">
                                            
                                        <td>Sr.No</td>
									    <td>Order No</td>
                                        <td>Distinct Name</td>
                                        <td>Firstname</td>
                                        <td>LastName</td>
                                        <td>Order Status</td>
                                        </tr>
                                        
                                        </tr>
                                            
                                            </thead>
                                           <tbody id="appendData">  
                                           @foreach($district as $dis)
                                            <tr id="sid{{$dis->order_id}}">
                                          
                                            <td>{{ $no++ }}</td>
									        <td>{{$dis->order_id}}</td>
									        <td>{{ucwords($dis->district_title)}}</td>
                                            <td>{{$dis->firstname}} </td>
                                            <td>{{$dis->lastname}} </td>
                                            <td>{{ucwords($dis->order_status)}} </td>
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
    

// function export_pdf() {
//     $('.dropdown2').hide();
//     var doc = new jsPDF();
//     // var doc = new jsPDF('p', 'mm', [297, 210]);
//     // new jsPDF('l', 'mm', [297, 210]);
//     doc.addHTML($('#printDiv'), 15, 15, {
//         'background': '#fff',
//         // 'size': 'A4 landscape',
//         // 'height':'297 px',
//         // 'width':'210 px',
//         'border': '2px solid white',
//         // 'margin-left': '100px',
//     }, function() {
//         doc.save('District Wise Activity Report.pdf');
//     });
// }


//   $.get("announcements.php?selected="+selected, function(data){
//       $('.result').html(data);

//     $($(dropDown).parents('tr')[0]).find('input.price').val(data);

    


             

    $(document).ready(function() {
  
    $('#example').DataTable( {
        // "scrollY": 200,
        "scrollX": true
    } );    

    $(".delete").on("click", function () {
    return confirm('Are you sure you want to Delete?');
});

$('#state').change(function(){
            var state_id = this.value;
            $('#district').empty();
              
                $.ajax({
                url: "{{url('get-district')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',state_id:state_id},
                success:function(res){
                    $('#district').append('<option value="">Select District</option>');
                    $.each(res, function(key,val) {
                        $('#district').append('<option value='+val.id+'>'+val.title+'</option>');
                    });
                }
            });
        })

$( "#district" ).change(function() 
  {
     var district = $(this).val();
     var sr=1;
     var html="";
   // alert(district);
    $.ajax({
                url: "{{url('districttable')}}",
                type: "POST",
                data: {_token:'{{ csrf_token() }}',id:district},
                success:function(res){
                    $("#appendData").empty();
                    
                    //alert(res);
                    $.each(res, function(key,val) {
                        if(val.firstname==null){
                        val.firstname='';
                            }
                        if(val.lastname==null)
                        {
                            val.lastname='';
                        }
                        if(val.district_title==null)
                        {
                            val.district_title='';
                        }
                        if(val.order_status==null)
                        {
                            val.order_status='';
                        }
                   
                        html+="<tr><td>"+sr+"</td><td>"+val.order_id+"</td><td>"+val.district_title+"</td><td>"+val.firstname+"</td><td>"+val.lastname+"</td><td>"+val.order_status+"</td></tr>";
                       
                        // alert(val.order_id);
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
    filename = filename?filename+'.xls':'District Wise Activity Report.xls';
    
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

