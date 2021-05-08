@extends('layouts.app')
@section('title', 'Product Variation')
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddProductv">
                Add New Product Variation
              </button><br>
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
            <th>Product Variation ID</th>
            <th>Product Variation Name</th>
						<th>Product Variation Abbrevation</th>
            <th>Product Add on Price</th>
            <th>Actions</th>
          </tr>                                
          </thead>
            <tbody>
              @foreach($products as $vendor)
                <tr id="sid{{$vendor->id}}">
                  <td>{{$vendor->variation_id	}}</td>
                  <td>{{$vendor->variation_name}}</td>
                  <td>{{$vendor->variation_abbrevation}}</td>
                  <td>{{$vendor->add_on_price}}</td>
                  <td>
                    <a href="javascript:void(0)" onclick="editProductv({{$vendor->variation_id}})"class="fa fa-secondary" style="font-size:24px"><i class="fa fa-pencil"></i></a> &nbsp;
                   <a href="javascript:void(0)"  onclick="deleteProductv({{$vendor->variation_id}})"  class="fa fa-trash" style="font-size:24px;color:red"></a>
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
  <hr/>
</div>
</div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
   
  
<div
                class="modal fade text-left"
                id="AddProductv"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      
                    </div>
                    <form id="ProductvForm" name="ProductvForm">
                    @csrf
                      <div class="modal-body">
                      <div class="form-group">
                    <label for="location">Product variation Name</label>
                    <input type="text" class="form-control" id="variation_name" name="variation_name"/>
                </div>

                       
                <div class="form-group">
                    <label for="Transport">Product variation Abbrivation</label>
                    <input type="text" class="form-control" id="variation_abbrevation" name="variation_abbrevation">
                </div>

                <div class="form-group">
                    <label for="Transport">Product variation Ad on Price</label>
                    <input type="text" class="form-control" id="variation_add_on_price" name="variation_add_on_price">
                </div>
                </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


<!-- Add Categories Modal -->
<div class="modal fade" id="AddProductv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form  id="ProductvForm" name="ProductvForm">
           @csrf
                <div class="form-group">
                    <label for="location">Product variation Name</label>
                    <input type="text" class="form-control" id="variation_name" name="variation_name"/>
                </div>

                       
                <div class="form-group">
                    <label for="Transport">Product variation Abbrivation</label>
                    <input type="text" class="form-control" id="variation_abbrevation" name="variation_abbrevation">
                </div>

                <div class="form-group">
                    <label for="Transport">Product variation Ad on Price</label>
                    <input type="text" class="form-control" id="variation_add_on_price" name="variation_add_on_price">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>



<div
                class="modal fade text-left"
                id="EditProductv"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      
                    </div>
                    <form id="EditProductvForm" name="EditProductvForm">
                    <input type="hidden" id="variation_id" name="variation_id" >
                    @csrf
                      <div class="modal-body">
                      <div class="form-group">
                <label for="location">Product variation Name</label>
                <input type="text" class="form-control" id="variation_name1" name="variation_name1"/>
            </div>

            <div class="form-group">
                <label for="phone">Product variation Abbrivation</label>
                <input type="text" class="form-control" id="variation_abbrevation1" name="variation_abbrevation1"/>
            </div>
            
            <div class="form-group">
                <label for="Transport">Product variation Add on Price</label>
                <input type="text" class="form-control" id="variation_add_on_price1" name="variation_add_on_price1">
                
            </div>
                </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


<script>  
$("#ProductvForm").submit(function(e){
  e.preventDefault();
    let variation_name=$("#variation_name").val();
    let variation_abbrevation=$("#variation_abbrevation").val();
    let add_on_price=$("#variation_add_on_price").val();
    let _token=$("input[name=_token]").val();

    $.ajax({
        url:"{{url('storproductsv')}}",
        type:"post",
        data:{
            variation_name:variation_name,
            variation_abbrevation:variation_abbrevation,
            add_on_price:add_on_price,
            _token:_token
        },
        success:function(response)
        {   

            if(response)
            {
               
               $("#studentTable tbody").append('<tr><td>'+response.variation_name+'</td><td>'+ response.variation_abbrevation +'</td><td>'+response.add_on_price+'</td></tr>');
                $('#ProductvForm')[0].reset();
                alert("inserted");
                $('#AddProductv').modal('toggle');
                location.reload()


            }
        }
    });
});
</script>

<script>
    function editProductv(variation_id)
    {
        $.get('/productsv/'+variation_id,function(categories){
               $("#variation_id").val(categories.variation_id);
               $("#variation_name1").val(categories.variation_name);
                $("#variation_abbrevation1").val(categories.variation_abbrevation);
                $("#variation_add_on_price1").val(categories.add_on_price);
                $("#EditProductv").modal('toggle');
        });
    }
    $("#EditProductvForm").submit(function(e){
        e.preventDefault();
        let variation_id=$("#variation_id").val();
        let variation_name=$("#variation_name1").val();
        let variation_abbrevation=$("#variation_abbrevation1").val();
        let add_on_price=$("#variation_add_on_price1").val();
        let _token=$("input[name=_token]").val();
        
        $.ajax({
            url:"{{url('productsv')}}",
            type:"post",
            data:{
               variation_id:variation_id,
               variation_name:variation_name,
               variation_abbrevation:variation_abbrevation,
               add_on_price:add_on_price,
                _token:_token
            },
            success:function(response){
                // $('#sid' +response.id+' td:nth-child(1)').text(response.vendor_name);
                // $('#sid' +response.id+' td:nth-child(2)').text(response.location);
                // $('#sid' +response.id+' td:nth-child(3)').text(response.phone);
                // $('#sid' +response.id+' td:nth-child(4)').text(response.email);
                // $('#sid' +response.id+' td:nth-child(5)').text(response.INV_No);
                // $('#sid' +response.id+' td:nth-child(6)').text(response.Transport);

                $("#EditProductv").modal('toggle');
                $('#EditProductvForm')[0].reset();
                location.reload();
            }
        });

    });

</script>
<script>
    function deleteProductv(id)
    {
        if(confirm("Do You Really want to delete this record?"))
        {
          
            $.ajax({
                url:'/productsv/'+id,
                type:'DELETE',
                data:{
                  _token:$("input[name=_token]").val()

                },
                success:function(response)
                {
                    $('#sid'+id).remove();
                    location.reload();
                  
                }
            })
        }
    }
</script>



</html>     

@endsection