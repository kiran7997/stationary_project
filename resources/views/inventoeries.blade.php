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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#invenModal">
                Add New Inventory
              </button><br>
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      
      
      <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
                                <th>inventory_name</th>
                                <th>inventory_address</th>
                                <th>inventory_contact</th>
                                <th>inventory_email</th>
                                <th>product_id</th>
                                <th>quantity</th>
                                <th>invntory_status</th>
                                <th>Actions</th>
                                </tr>                                        
                            </thead>
                            <tbody>
                            @foreach($invens as $inven)
                            <tr id="sid{{$inven->inventory_id}}">
                                <td>{{$inven->inventory_name}}</td>
                                <td>{{$inven->inventory_address}}</td>
                                <td>{{$inven->inventory_contact}}</td>
                                <td>{{$inven->inventory_email}}</td>
                                <td>{{$inven->product_id}}</td>
                                <td>{{$inven->quantity}}</td>
                                <td>{{$inven->invntory_status}}</td>

<!-- 
                                <a href="javascript:void(0)" onclick="editinven({{$inven->inventory_id}})" class="fa fa-edit"style="font-size:24px"></a>
                                <a href="javascript:void(0)"  onclick="deleteinven({{$inven->inventory_id}})"  class="fa fa-trash"style="font-size:24px;color:red"></a> -->
<td>
                                <a href="javascript:void(0)" onclick="editinven({{$inven->inventory_id}})"
            class="fa fa-edit" style="font-size:24px"></a>
        <a href="javascript:void(0)" onclick="deleteinven({{$inven->inventory_id}})"
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
  
@endsection
<div class="modal fade text-left"
                id="invenModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel33">Add Inventories</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form id="invenForm" name="invenForm"> 
                    <input type="hidden" name="inventory_id" id="inventory_id">
                      <div class="modal-body">
                      <label for="inventory_name">Inventory_Name </label>
                        <div class="form-group">
                        <input type="text" name="inventory_name" id="inventory_name" class="form-control" >
                         </div>

                         <label for="inventory_address">Inventory_address</label>
                        <div class="form-group">
                        <input type="text" name="inventory_address" id="inventory_address" class="form-control" >
                         </div>

                          
                         <label for="inventory_contact">inventory_contact </label>
                        <div class="form-group">
                        <input type="text" name="inventory_contact" id="inventory_contact" class="form-control" >
                         </div>

                         <label for="inventory_email"> inventory_email</label>
                        <div class="form-group">
                        <input type="text" name="inventory_email" id="inventory_email" class="form-control" >
                        </div>

                        <label for="product_id">Select Type</label> &nbsp;&nbsp;
                        <div class="form-group">
                        <select name="product_id" id="product_id"  class="form-control" >
                            <option >Select Option</option>
                             <option value="1">Pen</option>
                             <option value="2">Text Book</option>
                             <option value="3">Pencil</option>
                             <option value="4">Colorbox</option>
                            <option value="5">Drawing Book</option>
             
                            </select>
        
                        </div>
                        <label for="quantity">Item Quantity </label>
                        <div class="form-group">
                        
                          <input type="text" name="quantity" id="quantity" class="form-control" >
                        </div>
                        <label for="invntory_status">Invntory_Status  </label>
                        <div class="form-group">
                        
                          <input type="text" name="invntory_status" id="invntory_status" class="form-control" >
                        </div>
                        
            
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

   <!-- Student model -->
<div class="modal fade" id="invenEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Inventoeries</h5>
        
      </div>
      <form id="invenEditForm" name="invenEditForm"> 
      <div class="modal-body">
                      <label for="inventory_name">Inventory_Name </label>
                        <div class="form-group">
                        <input type="text" name="inventory_name2" id="inventory_name2" class="form-control" placeholder="inventory_name">
                         </div>

                         <label for="inventory_address">Inventory_Address</label>
                        <div class="form-group">
                        <input type="text" name="inventory_addres2" id="inventory_address2" class="form-control" placeholder="inventory_address">
                         </div>

                          
                         <label for="inventory_contact">Inventory_Contact </label>
                        <div class="form-group">
                        <input type="text" name="inventory_contact2" id="inventory_contact2" class="form-control" placeholder="inventory_contact">
                         </div>

                         <label for="inventory_email"> Inventory_Email</label>
                        <div class="form-group">
                        <input type="text" name="inventory_email2" id="inventory_email2" class="form-control" placeholder="inventory_email">
                        </div>

                        <label for="product_id">Product Type</label> &nbsp;&nbsp;
                        <div class="form-group">
                        <select name="product_id2" id="product_id2"  class="form-control" >
                            <option >Select Option</option>
                             <option value="1">Pen</option>
                             <option value="2">Text Book</option>
                             <option value="3">Pencil</option>
                             <option value="4">Colorbox</option>
                            <option value="5">Drawing Book</option>
             
                            </select>
        
                        </div>
                        <label for="quantity">Item Quantity </label>
                        <div class="form-group">
                        
                          <input type="text" name="quantity2" id="quantity2" class="form-control" >
                        </div>
                        <label for="invntory_status"> invntory_status</label>
                        <div class="form-group">
                        
                          <input type="text" name="invntory_status2" id="invntory_status2" class="form-control" >
                        </div>
                        </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>



<!-- <div class="modal fade" id="invenEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="invenEditForm" name="invenEditForm">
         @csrf
         <input type="hidden" name="inventory_id" id="inventory_id">
         <div class="form-group">
                <label for="inventory_name">Inventory_Name </label>
                <input type="text" name="inventory_name2" id="inventory_name2" class="form-control" placeholder="inventory_name">
            </div><br>
            <div class="form-group">
                <label for="inventory_address">Inventory_address</label>
                <input type="text" name="inventory_address2" id="inventory_address2" class="form-control" placeholder="inventory_address">
            </div><br>
            <div class="form-group">
                <label for="inventory_contact">inventory_contact </label>
                <input type="text" name="inventory_contact2" id="inventory_contact2" class="form-control" placeholder="inventory_contact">
            </div><br>
            <div class="form-group">
                <label for="inventory_email"> inventory_email</label>
                <input type="text" name="inventory_email2" id="inventory_email2" class="form-control" placeholder="inventory_email">
            </div><br>
           
         <div class="form-group">
         
         <label for="product_id">Select Type</label> &nbsp;&nbsp;
         <select name="product_id2" id="product_id2"  class="form-control" >
            <option >Select Option</option>
             <option value="1">Pen</option>
             <option value="2">Text Book</option>
             <option value="3">Pencil</option>
             <option value="4">Colorbox</option>
             <option value="5">Drawing Book</option>
             
        </select>
                
            </div>
            <div class="form-group">
                <label for="quantity">Item Quantity </label>
                <input type="text" name="quantity2" id="quantity2" class="form-control" placeholder="Quantity">
            </div><br>
            <div class="form-group">
                <label for="invntory_status"> </label>
                <input type="text" name="invntory_status2" id="invntory_status2" class="form-control" placeholder="invntory_status">
            </div><br>
           <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>  -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>  
$("#invenForm").submit(function(e){
  e.preventDefault();
    let inventory_name=$("#inventory_name").val();
    alert(inventory_name);
    let inventory_address=$("#inventory_address").val();
    let inventory_contact=$("#inventory_contact").val();
    let inventory_email=$("#inventory_email").val();
    let product_id=$("#product_id").val();
    let quantity=$("#quantity").val();
    let invntory_status=$("#invntory_status").val();
    let _token=$("input[name=_token]").val();

    $.ajax({
        url:"{{url('addinven')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        type:"post",

        
        data:{
            inventory_name:inventory_name,
            inventory_address:inventory_address,
            inventory_contact:inventory_contact,
            inventory_email:inventory_email,
            product_id:product_id,
            quantity:quantity,
            invntory_status:invntory_status,
            _token:_token
        },
        
        success:function(response)
        
        //alert(JSON.stringify(ret));
        
        {     

            if(response)
            {
                 //alert('hh');
               
            
             $("#invenTable tbody").append('<tr><td>'+response.inventory_name+'</td><td>'+response.inventory_address+'</td><td>'+response.inventory_contact+'</td><td>'+response.inventory_email+'</td><td>');
            $('#invenForm')[0].reset();
                alert(" Data Inserted Succcessfully");
                $('#invenModal').modal('toggle');
                location.reload();

            }
        }
    });
});

        </script>
<script>
    function editinven(inventory_id)
    {
        $.get('/editi/'+inventory_id,function(inventories){
               $("#inventory_id").val(inventories.inventory_id);
               $("#inventory_name2").val(inventories.inventory_name);
               $("#inventory_address2").val(inventories.inventory_address);
               $("#inventory_contact2").val(inventories.inventory_contact);
               $("#inventory_email2").val(inventories.inventory_email);
                $("#product_id2").val(inventories.product_id);
                $("#quantity2").val(inventories.quantity);
                $("#invntory_status2").val(inventories.invntory_status);

                $("#invenEditModal").modal('toggle');
                
     });
    }
    $("#invenEditForm").submit(function(e){
     
        e.preventDefault();
        let inventory_id=$("#inventory_id").val();
        let inventory_name=$("#inventory_name2").val();
        let inventory_address=$("#inventory_address2").val();
        let inventory_contact=$("#inventory_contact2").val();
        let inventory_email=$("#inventory_email2").val();
        let product_id=$("#product_id2").val();
        let quantity=$("#quantity2").val();
        let invntory_status=$("#invntory_status2").val();
        
        let _token=$("input[name=_token]").val();

        
        $.ajax({
            url:"{{url('editinven')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:"post",
            data:{
                inventory_id:inventory_id,
                inventory_name:inventory_name,
                inventory_address:inventory_address,
                inventory_contact:inventory_contact,
                inventory_email:inventory_email,
                product_id:product_id,
                quantity:quantity,
                invntory_status:invntory_status,
                _token:_token
            },
            success:function(response){
                alert("Data Updated Successfully");
                $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_name);
                $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_address);
                $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_contact);
                $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_email);
                $('#sid' +response.id+' td:nth-child(1)').text(response.product_id);
                $('#sid' +response.id+' td:nth-child(2)').text(response.quantity);
                $('#sid' +response.id+' td:nth-child(1)').text(response.invntory_status);
              
               
                $("#invenEditModal").modal('toggle');
                $('#invenEditForm')[0].reset();
                location.reload();
            }
        });

    });

</script>


<script>
function deleteinven(inventory_id)
{
    
    if(confirm("Do you want to delete this record?"))
    {
        alert(inventory_id),
        $.ajax({
            url:'/delei/'+inventory_id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'DELETE',
            data:{
                _token:$("input[name=_token]").val()
                
            },
            success:function(response)
            {
                $('#sid'+inventory_id).remove();
                alert('deleted Successfully');
                location.reload();
            }
     
        })
    }   
}
</script>

</body>
</html>