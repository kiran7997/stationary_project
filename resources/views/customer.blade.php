@extends('layouts.app')
@section('title', 'Customer')
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#custModal">
                Add New Customer
              </button><br>
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      
      
      <div class="table-responsive">
        <table class="table">
        <thead>
                                 <th>Company Name</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Username</th>
                               
                                <th>Status</th>
                                <th>Login Ip</th>
                                <th>Last Login At</th>
                                <th>Actions</th>                            
                            </thead>
                            <tbody>
                               
                               @foreach($customers as $customer)
                             <tr id="sid{{$customer->customer_id}}">
                                 <td>{{$customer->company_name}}</td>
                                 <td>{{$customer->customer_firstname}}</td>
                                 <td>{{$customer->customer_lastname}}</td>
                                 <td>{{$customer->email}}</td>
                                 <td>{{$customer->customer_phone}}</td>
                                 <td>{{$customer->username}}</td>
                               
                                 <td>{{$customer->customer_status}}</td>
                                 <td>{{$customer->login_ip}}</td>
                                 <td>{{$customer->last_login_at}}</td>
                                 
 
                                 <td>
                                 
                                          
                                  <a href="javascript:void(0)" onclick="editcust({{$customer->customer_id}})" class="fa fa-edit"style="font-size:24px"></a>
                                 <a href="javascript:void(0)"  onclick="deletecust({{$customer->customer_id}})"  class="fa fa-trash"style="font-size:24px;color:red"></a>
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
      





   <!-- Customer model -->
   <div
                class="modal fade text-left"
                id="custModal"
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
                    <form id="custForm" name="custForm"> 
                   
                      <div class="modal-body">
                      <label for="company_name">Company Name </label>
                        <div class="form-group">
                         <input type="text" name="company_name" id="company_name" class="form-control" >
                         </div>

                         <label for="customer_firstname">Customer Firstname</label>
                         <div class="form-group">
                        <input type="text" name="customer_firstname" id="customer_firstname" class="form-control" >
                         </div>

                          
                         <label for="inventory_contact">Customer Lastname </label>
                        <div class="form-group">
                        <input type="text" name="customer_lastname" id="customer_lastname" class="form-control" >
                         </div>

                         <label for="customer_phone">Customer Phone</label>
                        <div class="form-group">
                        <input type="text" name="customer_phone" id="customer_phone" class="form-control" >
                         </div>

                         <label for="email"> Customer Email</label>
                            <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" >
                        </div>
                        
                
                     <label for="username">Customer Username</label>
                        <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" >
                        </div>

                        <label for="password">Customer Password</label>
                        <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" >
                        </div>

                        
                
                        <label for="product_id">Customer Status</label> &nbsp;&nbsp;
                        <div class="form-group">
                    <select name="customer_status" id="customer_status"  class="form-control" >
                        <option >Select Option</option>
                         <option value="active">Active</option>
                        <option value="deactive">Inactive</option>
                        <option value="block">Block</option>
                     </select>
                     </div>
                    
                     <label for="login_ip">Login Ip</label>
                        <div class="form-group">
                        <input type="text" name="login_ip" id="login_ip" class="form-control" >
                        </div>

                       
                    <label for="last_login_at">Last Login At </label>
                        <div class="form-group">
                        
                        <input type="text" name="last_login_at" id="last_login_at" class="form-control" >
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



            <div
                class="modal fade text-left"
                id="custEditModal"
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
                    <form id="custEditForm" name="custEditForm"> 
                    <input type="hidden" name="customer_id" id="customer_id">
                      <div class="modal-body">
                      <label for="company_name">Company Name </label>
                        <div class="form-group">
                         <input type="text" name="company_name2" id="company_name2" class="form-control" >
                         </div>

                         <label for="customer_firstname">Customer Firstname</label>
                         <div class="form-group">
                        <input type="text" name="customer_firstname2" id="customer_firstname2" class="form-control" >
                         </div>

                          
                         <label for="inventory_contact">Customer Lastname </label>
                        <div class="form-group">
                        <input type="text" name="customer_lastname2" id="customer_lastname2" class="form-control" >
                         </div>
                         <label for="customer_phone2">Customer Phone</label>
                        <div class="form-group">
                        <input type="text" name="customer_phone2" id="customer_phone2" class="form-control" >
                         </div>

                         <label for="email2"> Customer Email</label>
                            <div class="form-group">
                        <input type="text" name="email2" id="email2" class="form-control" >
                        </div>
                        
                
                     <label for="username">Customer Username</label>
                        <div class="form-group">
                        <input type="text" name="username2" id="username2" class="form-control" >
                        </div>

                        <label for="password2">Customer Password</label>
                        <div class="form-group">
                        <input type="password" name="password2" id="password2" class="form-control" >
                        </div>

                        
                
                        <label for="product_id">Customer Status</label> &nbsp;&nbsp;
                        <div class="form-group">
                    <select name="customer_status2" id="customer_status2"  class="form-control" >
                        <option >Select Option</option>
                         <option value="active">Active</option>
                        <option value="deactive">Deactive</option>
                        <option value="block">Block</option>
                     </select>
                     </div>
                    
                     <label for="login_ip">Login Ip</label>
                        <div class="form-group">
                        <input type="text" name="login_ip2" id="login_ip2" class="form-control" >
                        </div>

                       
                    <label for="last_login_at">Last Login At </label>
                        <div class="form-group">
                        
                        <input type="text" name="last_login_at2" id="last_login_at2" class="form-control" >
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
<!-- 
<div class="modal fade" id="custModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customers</h5>
        
      </div>
      <div class="modal-body">

        <form id="custForm" name="custForm"> 
         @csrf
         <div class="form-group">
                <label for="company_name">Company_Name </label>
                <input type="text" name="company_name" id="company_name" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_firstname">Customer_Firstname</label>
                <input type="text" name="customer_firstname" id="customer_firstname" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_lastname">Customer_Lastname </label>
                <input type="text" name="customer_lastname" id="customer_lastname" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_email"> Customer_Email</label>
                <input type="text" name="customer_email" id="customer_email" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_phone">Customer_Phone</label>
                <input type="text" name="customer_phone" id="customer_phone" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_username">Customer_Username</label>
                <input type="text" name="customer_username" id="customer_username" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_password">Customer_Password</label>
                <input type="password" name="customer_password" id="customer_password" class="form-control" >
            </div><br>
            <div class="form-group">
         
         <label for="customer_status">Select Type</label> &nbsp;&nbsp;
         <select name="customer_status" id="customer_status"  class="form-control" >
            <option >Select Option</option>
             <option value="active">Active</option>
             <option value="deactive">Deactive</option>
             <option value="block">Block</option>
         </select>
                
            </div>
            
            <div class="form-group">
                <label for="login_ip">Login_Ip</label>
                <input type="text" name="login_ip" id="login_ip" class="form-control" >
            </div><br>
           

            <div class="form-group">
                <label for="last_login_at">last_login_at </label>
                <input type="text" name="last_login_at" id="last_login_at" class="form-control" placeholder="Quantity">
            </div><br>
            
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
      </div>
      
    </div>
  </div>
</div>



<div class="modal fade" id="custEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="custEditForm" name="custEditForm">
         @csrf
         <input type="hidden" name="customer_id" id="customer_id">
         <div>
         <label for="company_name">Company_Name </label>
                <input type="text" name="company_name2" id="company_name2" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_firstname">Customer_Firstname</label>
                <input type="text" name="customer_firstname2" id="customer_firstname2" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_lastname">Customer_Lastname </label>
                <input type="text" name="customer_lastname2" id="customer_lastname2" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_email"> Customer_Email</label>
                <input type="text" name="customer_email2" id="customer_email2" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_phone">Customer_Phone</label>
                <input type="text" name="customer_phone2" id="customer_phone2" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_username">Customer_Username</label>
                <input type="text" name="customer_username2" id="customer_username2" class="form-control" >
            </div><br>
            <div class="form-group">
                <label for="customer_password">Customer_Password</label>
                <input type="password" name="customer_password2" id="customer_password2" class="form-control" >
            </div><br>
            <div class="form-group">
         
         <label for="customer_status">Select Type</label> &nbsp;&nbsp;
         <select name="customer_status2" id="customer_status2"  class="form-control" >
            <option >Select Option</option>
             <option value="active">Active</option>
             <option value="deactive">Deactive</option>
             <option value="block">Block</option>
         </select>
                
            </div>
            
            <div class="form-group">
                <label for="login_ip">Login_Ip</label>
                <input type="text" name="login_ip2" id="login_ip2" class="form-control" >
            </div><br>
           

            <div class="form-group">
                <label for="last_login_at">last_login_at </label>
                <input type="text" name="last_login_at2" id="last_login_at2" class="form-control" placeholder="Quantity">
            </div><br>
           <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>  -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script> 
 
 $("#custForm").submit(function(e){
  e.preventDefault();
    let company_name=$("#company_name").val();
    let customer_firstname=$("#customer_firstname").val();
    let customer_lastname=$("#customer_lastname").val();
    let email=$("#email").val();
    let customer_phone=$("#customer_phone").val();
    let username=$("#username").val();
    let password=$("#password").val();
    let customer_status=$("#customer_status").val();
    let login_ip=$("#login_ip").val();
    let last_login_at=$("#last_login_at").val();
    let _token=$("input[name=_token]").val();

    $.ajax({
        url:"{{url('addcust')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:"post",
        data:{
            company_name:company_name,
            customer_firstname:customer_firstname,
            customer_lastname:customer_lastname,
            email:email,
            customer_phone:customer_phone,
            username:username,
            password:password,
            customer_status:customer_status,
            login_ip:login_ip,
            last_login_at:last_login_at,
            _token:_token
        },
        success:function(response)
        {     alert("Data Inserted Successfully");

            if(response)
            {
                 //alert(JSON.stringify(response));
               
              //  $("#vendorTable tbody").append(response.vendor_name+'</td><td>'+ response.location +'</td><td>'+response.phone +'</td><td>'+ response.email +'</td><td>'+ response.INV_No +'</td><td>'+ response.Transport);
                $("#custTable tbody").append('<tr><td>'+response.company_name+
                '</td><td>'+response.customer_lastname+'</td><td>'
                +response.email+'</td><td>'
                +response.customer_phone+'</td><td>'
                +response.username+'</td><td>'
                +response.customer_status+'</td><td>'
                +response.login_ip+'</td><td>'
                +response.last_login_at+'</td><td>'
               );

                $('#custForm')[0].reset();
              
                $('#custModal').modal('toggle');
                location.reload();


            }
        }
    });
});

</script>

<script>
 
    function editcust(customer_id)
    {
        $.get('/editc/'+customer_id,function(customer){
            alert(JSON.stringify(customer)); 
              $("#customer_id").val(customer.customer_id);
               $("#company_name2").val(customer.company_name);
                $("#customer_firstname2").val(customer.customer_firstname);
                $("#customer_lastname2").val(customer.customer_lastname);
                $("#email2").val(customer.email);
                $("#customer_phone2").val(customer.customer_phone);
                $("#username2").val(customer.username);
                $("#password2").val(customer.password);
                $("#customer_status2").val(customer.customer_status);
                $("#login_ip2").val(customer.login_ip);
                $("#last_login_at2").val(customer.last_login_at);
                $("#custEditModal").modal('toggle');


        });
    }
    $("#custEditForm").submit(function(e){
     
        e.preventDefault();
        let customer_id=$("#customer_id").val();
        let company_name=$("#company_name2").val();
        let customer_firstname=$("#customer_firstname2").val();
        let customer_lastname=$("#customer_lastname2").val();
        let email=$("#email2").val();
        let customer_phone=$("#customer_phone2").val();
        let username=$("#username2").val();
        let password=$("#password2").val();
        let customer_status=$("#customer_status2").val();
        let login_ip=$("#login_ip2").val();
        let last_login_at=$("#last_login_at2").val();
        let _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{url('editcust')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:"post",
            data:{
                customer_id:customer_id,
                company_name:company_name,
            customer_firstname:customer_firstname,
            customer_lastname:customer_lastname,
            email:email,
            customer_phone:customer_phone,
            username:username,
            password:password,
            customer_status:customer_status,
            login_ip:login_ip,
            last_login_at:last_login_at,
            _token:_token
            },
            success:function(response){
                alert("Data Updated Successfully");
                $('#sid' +response.id+' td:nth-child(1)').text(response.customer_id);
                $('#sid' +response.id+' td:nth-child(2)').text(response.company_name);
                $('#sid' +response.id+' td:nth-child(2)').text(response.customer_firstname);
                $('#sid' +response.id+' td:nth-child(2)').text(response.customer_lastname);
                $('#sid' +response.id+' td:nth-child(2)').text(response.email);
                $('#sid' +response.id+' td:nth-child(2)').text(response.customer_phone);
                $('#sid' +response.id+' td:nth-child(2)').text(response.username);
                //$('#sid' +response.id+' td:nth-child(2)').text(response.customer_password);
                $('#sid' +response.id+' td:nth-child(2)').text(response.customer_status);
                $('#sid' +response.id+' td:nth-child(2)').text(response.login_ip);
                $('#sid' +response.id+' td:nth-child(2)').text(response.last_login_at);

                $("#custEditModal").modal('toggle');
                $('#custEditForm')[0].reset();
                location.reload();
            }
        });

    });

</script>


<script>
function deletecust(customer_id)
{
    if(confirm("Do you want to delete this record?"))
    {
        $.ajax({
            url:'/delec/'+customer_id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'DELETE',
            data:{
                _token:$("input[name=_token]").val()
            },
            success:function(response)
            {
                $('#sid'+customer_id).remove();
            }
        
        })
    }
}
</script>

</body>
</html>

@endsection