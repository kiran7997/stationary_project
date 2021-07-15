<!-- Start -->
@extends('layouts.app')
@section('title', 'Customers')
@section('content')

<head>

    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
</head>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Customers</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('customer') }}">Customers</a>
                                </li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header border-bottom">
                                <h4 class="card-title"></h4>
                                <!-- <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#supplierPModal">
                                    Add New Supplier
                                </button> -->
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
                            <table id="example" class="display nowrap stripe" style="width:100%;">
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
                                    <a href="javascript:void(0)" onclick="editcust({{$customer->customer_id}})" class="fa fa-edit"
                                        style="font-size:24px"></a>
                                     <a href="javascript:void(0)" onclick="deletecust({{$customer->customer_id}})" class="fa fa-trash"
                                        style="font-size:24px;color:red"></a>
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


<!-- Add Stock Model -->

<div class="modal fade text-left " id="supplierPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title" id="myModalLabel33"> Add Supplier</h4>
				<button type="button" class="close"  onclick="myFunction()" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            
            <form id="custForm" name="custForm">

                <div class="modal-body">
                   <label for="company_name">Company Name </label>
                   <div class="form-group">
                   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                  <input type="text" name="company_name" id="company_name" class="form-control">
                </div>

              <label for="customer_firstname">Customer Firstname</label>
              <div class="form-group">
              <input type="text" name="customer_firstname" id="customer_firstname" class="form-control">
              </div>


                <label for="inventory_contact">Customer Lastname </label>
                <div class="form-group">
                 <input type="text" name="customer_lastname" id="customer_lastname" class="form-control">
                </div>

                <label for="customer_phone">Customer Phone</label>
                <div class="form-group">
                <input type="text" name="customer_phone" id="customer_phone" class="form-control">
                </div>

              <label for="email"> Customer Email</label>
              <div class="form-group">
              <input type="text" name="email" id="email" class="form-control">
              </div>


             <label for="username">Customer Username</label>
              <div class="form-group">
             <input type="text" name="username" id="username" class="form-control">
            </div>

              <label for="password">Customer Password</label>
              <div class="form-group">
              <input type="password" name="password" id="password" class="form-control">
              </div>  

                <label for="product_id">Customer Status</label> &nbsp;&nbsp;
                <div class="form-group">
                <select name="customer_status" id="customer_status" class="form-control">
                  <option>Select Option</option>
                  <option value="active">Active</option>
                  <option value="deactive">Inactive</option>
                 <option value="block">Block</option>
               </select>
              </div>

            <label for="login_ip">Login Ip</label>
            <div class="form-group">
           <input type="text" name="login_ip" id="login_ip" class="form-control">
          </div>

                <label for="last_login_at">Last Login At </label>
              <div class="form-group">
                <input type="text" name="last_login_at" id="last_login_at" class="form-control">
              </div>



          </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</form>

        </div>
    </div>
</div>



</div>
</div>


<div class="modal fade text-left " id="custEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33"> Edit Supplier</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>

            <form id="custEditForm" name="custEditForm">
        <input type="hidden" name="customer_id" id="customer_id">
        <div class="modal-body">
          <label for="company_name">Company Name </label>
          <div class="form-group">
            <input type="text" name="company_name2" id="company_name2" class="form-control">
          </div>

          <label for="customer_firstname">Customer Firstname</label>
          <div class="form-group">
            <input type="text" name="customer_firstname2" id="customer_firstname2" class="form-control">
          </div>


          <label for="inventory_contact">Customer Lastname </label>
          <div class="form-group">
            <input type="text" name="customer_lastname2" id="customer_lastname2" class="form-control">
          </div>
          <label for="customer_phone2">Customer Phone</label>
          <div class="form-group">
            <input type="text" name="customer_phone2" id="customer_phone2" class="form-control">
          </div>

          <label for="email2"> Customer Email</label>
          <div class="form-group">
            <input type="text" name="email2" id="email2" class="form-control">
          </div>


          <label for="username">Customer Username</label>
          <div class="form-group">
            <input type="text" name="username2" id="username2" class="form-control">
          </div>

          <label for="password2">Customer Password</label>
          <div class="form-group">
            <input type="password" name="password2" id="password2" class="form-control">
          </div>



          <label for="product_id">Customer Status</label> &nbsp;&nbsp;
          <div class="form-group">
            <select name="customer_status2" id="customer_status2" class="form-control">
              <option>Select Option</option>
              <option value="active">Active</option>
              <option value="deactive">Deactive</option>
              <option value="block">Block</option>
            </select>
          </div>

          <label for="login_ip">Login Ip</label>
          <div class="form-group">
            <input type="text" name="login_ip2" id="login_ip2" class="form-control">
          </div>


          <label for="last_login_at">Last Login At </label>
          <div class="form-group">

            <input type="text" name="last_login_at2" id="last_login_at2" class="form-control">
          </div>



        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>


</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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


@endsection
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
});


</script>

