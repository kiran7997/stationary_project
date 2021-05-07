@extends('layouts.app')
@section('title', 'Unit')
@section('content')
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
  <style>


 label.error {
         color: #dc3545;
         font-size: 14px;
    }

</style>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  
  <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

   
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    
                    
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrumb-right">
              <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Tables start -->
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Addunit">
                Add New Unit
              </button>
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      
    
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
            <th>Unit ID</th>
           <th>Unit Name</th>
						<th>Unit Description</th>
            <th>Actions</th>
            </tr>
          </thead>
         
<tbody>
                            @foreach($units as $vendor)
                            <tr id="sid{{$vendor->id}}">
                                <td>{{$vendor->unit_id}}</td>
                                <td>{{$vendor->unit_name}}</td>
                                <td>{{$vendor->unit_description}}</td>
                                <td>
                               
                                        <a href="javascript:void(0)" onclick="editUnits({{$vendor->unit_id}})" class="fa fa-secondary" style="font-size:24px"><i class="fa fa-pencil"></i></a> &nbsp;
                                        <a href="javascript:void(0)"  onclick="deleteUnits({{$vendor->unit_id}})"  class="fa fa-trash" ></a>
                              </td>
                            </tr>
                                @endforeach
                            </tbody>
                            
        </table>
      </div>
    </div>
  </div>
</div>
   </div>
      </div>
    </div>
      

  <hr />

 
 

 
</div>

    </div>
    <!-- End: Customizer-->

    <!-- Buynow Button-->
    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
   


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    
  </body>
  <!-- END: Body-->
</html>
<div
                class="modal fade text-left"
                id="Addunit"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      
                    </div>
                    <form id="UnitForm" name="UnitForm">
                    @csrf
                      <div class="modal-body">
                      <div class="form-group">
                      <div class="form-group">
                <label for="location">Unit Name</label>
                <input type="text" class="form-control" id="unit_name" name="unit_name"/>
            </div>
            <div class="form-group">
                <label for="phone">Unit Description</label>
                <input type="text" class="form-control" id="unit_description" name="unit_description"/>
            </div>
                </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


              <div
                class="modal fade text-left"
                id="EditUnits"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      
                    </div>
                    <form id="EditUnitForm" name="EditUnitForm">
                    <input type="hidden" id="unit_id" name="unit_id" >

                    @csrf
                      <div class="modal-body">
                      <div class="form-group">
                      <div class="form-group">
                <label for="location">Unit Name</label>
                <input type="text" class="form-control" id="unit_name1" name="unit_name1"/>
            </div>
            <div class="form-group">
                <label for="phone">Unit Description</label>
                <input type="text" class="form-control" id="unit_description1" name="unit_description1"/>
            </div>
                </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

<!-- AJAX insert Unit model -->
<script src="ajaxcdn.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/units.js"></script>
<script>  
$("#UnitForm").submit(function(e){
  e.preventDefault();
    let unit_name=$("#unit_name").val();
    let unit_description=$("#unit_description").val();
    let _token=$("input[name=_token]").val();
  
    $.ajax({
        url:"{{url('storeunit')}}",
        type:"post",
        data:{
            unit_name:unit_name,
            unit_description:unit_description,
           
            _token:_token
        },
        success:function(response)
        {   

            if(response)
            {
               
               $("#studentTable tbody").append('<tr><td>'+response.unit_name+'</td><td>'+ response.unit_description +'</td><td>'+response.unit_image+'</td></tr>');
                $('#UnitForm')[0].reset();
                alert("inserted");
                $('#Addunit').modal('toggle');
                location.reload();

            }
        }
    });
});
</script>
<!-- AJAX Update Unit model -->
<script>
    function editUnits(unit_id)
    {
        $.get('/units/'+unit_id,function(categories){
               $("#unit_id").val(categories.unit_id);
               alert(categories.unit_id);
               $("#unit_name1").val(categories.unit_name);
                $("#unit_description1").val(categories.unit_description);
                $("#EditUnits").modal('toggle');
        });
    }
    $("#EditUnitForm").submit(function(e){
        e.preventDefault();
        let unit_id=$("#unit_id").val();
        let unit_name=$("#unit_name1").val();
        let unit_description=$("#unit_description1").val();
        let _token=$("input[name=_token]").val();
        
        $.ajax({
            url:"{{url('units')}}",
            type:"post",
            data:{
                unit_id:unit_id,
                unit_name:unit_name,
                unit_description:unit_description,
                _token:_token
            },
            success:function(response){
                $('#sid' +response.id+' td:nth-child(1)').text(response.unit_name);
                $('#sid' +response.id+' td:nth-child(2)').text(response.unit_description);
                $("#EditUnits").modal('toggle');
                $('#EditUnitForm')[0].reset();
                location.reload()
            }
        });

    });

</script>
<!-- AJAX Delete Unit model -->
<script>
    function deleteUnits(id)
    {
        if(confirm("Do You Really want to delete this record?"))
        {
          
            $.ajax({
                url:'/units/'+id,
                type:'DELETE',
                data:{
                  _token:$("input[name=_token]").val()

                },
                success:function(response)
                {
                    $('#sid'+id).remove();
                    alert("eleted");
                    location.reload();
                  
                }
            })
        }
    }
</script>

</html>     

@endsection