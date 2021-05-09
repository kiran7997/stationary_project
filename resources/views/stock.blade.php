@extends('layouts.app')
@section('title', 'Stock')
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
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#stockModal">
                Add New Stock
              </button><br>
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      
      
      <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
        <th>Pdrouct_ID</th>
              <th>Item_Quantity</th>
              <th>Actions</th> 
                                </tr>                                        
                            </thead>
                            <tbody>
          @foreach($stocks as $stock)
           <tr id="sid{{$stock->stock_id}}">
                <td>{{$stock->product_id}}</td>
                <td>{{$stock->item_quantity}}</td>
                <td>
                <a href="javascript:void(0)" onclick="editStock({{$stock->stock_id}})"
            class="fa fa-edit" style="font-size:24px"></a>
        <a href="javascript:void(0)" onclick="deletestock({{$stock->stock_id}})"
            class="fa fa-trash" style="font-size:24px;color:red"></a>
          
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
    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
  
  


<!-- Edit Stock Model -->


<div
                class="modal fade text-left"
                id="stockModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                    Add Stock
                    </div>
                    <form id="stockForm" name="stockForm">
                    @csrf
                    <div class="form-group">
         
         <label for="product_id">Select Type</label> &nbsp;&nbsp;
         <select name="product_id" id="product_id"  class="form-control" required>
            <option >Select Option</option>
             <option value="1">Pen</option>
             <option value="2">Text Book</option>
             <option value="3">Pencil</option>
             <option value="4">Colorbox</option>
             <option value="5">Drawing Book</option>
             
        </select>
                
            </div>
            <br>
        <div class="form-group">
                <label for="item_quantity">Item Quantity </label>
                 <input type="text" name="item_quantity" id="item_quantity" class="form-control" placeholder="Quantity" required>
            </div><br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


<!-- exit -->

<div
                class="modal fade text-left"
                id="stockEditModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                    Edit Stock
                    </div>
                    <form id="stockEditForm" name="stockEditForm">
                    <input type="hidden" id="stock_id" name="stock_id" >
                    @csrf
                    <div class="form-group">
         
         <label for="product_id">Select Type</label> &nbsp;&nbsp;
         <select name="product_id2" id="product_id2"  class="form-control" required>
            <option >Select Option</option>
             <option value="1">Pen</option>
             <option value="2">Text Book</option>
             <option value="3">Pencil</option>
             <option value="4">Colorbox</option>
             <option value="5">Drawing Book</option>
             
        </select>
                
            </div>
            <br>
        <div class="form-group">
                <label for="item_quantity">Item Quantity </label>
                 <input type="text" name="item_quantity2" id="item_quantity2" class="form-control" placeholder="Quantity" required>
            </div><br>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

<!-- AJAX insert Stock model -->



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>



$("#stockForm").submit(function(e){
  e.preventDefault();
    let product_id=$("#product_id").val();
    
    let item_quantity=$("#item_quantity").val();

    let _token=$("input[name=_token]").val();

    $.ajax({
        url:"{{url('addstock')}}",
        dataType: 'json',
        type:"post",
        data:{
            product_id:product_id,
            item_quantity:item_quantity,
            _token:_token
        },
        
        success:function(response)
        {     alert("Data Inserted Successfully");

            if(response)
            {
                 //alert(JSON.stringify(response));
               
              //  $("#vendorTable tbody").append(response.vendor_name+'</td><td>'+ response.location +'</td><td>'+response.phone +'</td><td>'+ response.email +'</td><td>'+ response.INV_No +'</td><td>'+ response.Transport);
                $("#stockTable tbody").append('<tr><td>'+response.product_id+'</td><td>'+response.item_quantity+'</td><td>');
                $('#stockForm')[0].reset();
              
              $('#stockModal').modal('toggle');
              location.reload();
              
              
            
            }
        }
    });
});

</script>

<script>
    function editStock(stock_id)
    {
        $.get('/edit/'+stock_id,function(stock){
              $("#stock_id").val(stock.stock_id);
               $("#product_id2").val(stock.product_id);
                $("#item_quantity2").val(stock.item_quantity);
                $("#stockEditModal").modal('toggle');


        });
    }
    $("#stockEditForm").submit(function(e){
     
        e.preventDefault();
        let stock_id=$("#stock_id").val();
        let product_id=$("#product_id2").val();
        let item_quantity=$("#item_quantity2").val();
        let _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{url('editstock')}}",
            dataType: 'json',
            type:"post",
            data:{
              stock_id:stock_id,
                product_id:product_id,
                item_quantity:item_quantity,
                _token:_token
            },
            success:function(response){
                alert("Data Updated Successfully");
                $('#sid' +response.id+' td:nth-child(1)').text(response.product_id);
                $('#sid' +response.id+' td:nth-child(2)').text(response.item_quantity);
               
                $("#stockEditModal").modal('toggle');
                $('#stockEditForm')[0].reset();
                location.reload();
            }
        });

    });

</script>


<script>
function deletestock(stock_id)
{
    if(confirm("Do you want to delete this record?"))
    {
        $.ajax({
            url:'/dele/'+stock_id,
            type:'DELETE',
            data:{
                _token:$("input[name=_token]").val()
            },
            success:function(response)
            {
                $('#sid'+stock_id).remove();
            }
        
        })
    }
}
</script>

</body>
</html>
@endsection