@extends('layouts.app')
@section('title', 'Suppliers')
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
                        <h2 class="content-header-title float-left mb-0">Suppliers</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('supplier') }}">Suppliers</a>
                                </li>
                                <li class="breadcrumb-item active">Supplier
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
                                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#supplierPModal">
                                    Add New Suppliers
                                </button>
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
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Suppliers Address</th>
                                        <th>Suppliers Contact</th>
                                        <th>Suppliers Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $sup)
                                    <tr id="sid{{$sup->supplier_id}}">
                                        <td>{{$sup->supplier_companyName}}</td>
                                        <td>{{$sup->supplier_address}}</td>
                                        <td>{{$sup->supplier_contact}}</td>
                                        <td>{{$sup->supplier_email}}</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="editsup({{$sup->supplier_id}})"
                                                class="fa fa-edit" style="font-size:24px"></a>
                                            <a href="javascript:void(0)" onclick="deletesup({{$sup->supplier_id}})"
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


<!-- Add Stock Model -->

<div class="modal fade text-left " id="supplierPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Add Suppliers
            </div>

            <form id="supplierForm" name="supplierForm" method="post">
                @csrf
                <!-- <input type="hidden" name="inventory_id" id="inventory_id"> -->
                <div class="modal-body">
                    <label class="required" for="supplier_companyName">Company Name </label>
                    <div class="form-group">
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" name="supplier_companyName" id="supplier_companyName" class="form-control"
                            required>

                    </div>

                    <label class="required" for="supplier_address">Supplier Address</label>
                    <div class="form-group">
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" name="supplier_address" id="supplier_address" class="form-control"
                            required>

                    </div>

                    <label class="required" for="supplier_contact">Supplier Contact </label>
                    <div class="form-group">
                        <input type="number" name="supplier_contact" id="supplier_contact" class="form-control" required
                            minlength="10" maxlength="10">

                    </div>

                    <label class="required" for="supplier_email"> Supplier Email</label>
                    <div class="form-group">
                        <input type="email" name="supplier_email" id="supplier_email" onfocusout='IsEmail(this.value)'
                            class="form-control" required>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="form" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>


</div>
</div>

<div class="modal fade text-left " id="supplierEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Add Suppliers
            </div>

            <form id="supplierEditForm" name="supplierEditForm" method="post">
                @csrf
                <input type="hidden" name="supplier_id" id="supplier_id">
                <div class="modal-body">
                    <label class="required" for="supplier_companyName">Company Name </label>
                    <div class="form-group">
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" name="supplier_companyName" id="supplier_companyName2" class="form-control"
                            required>

                    </div>

                    <label class="required" for="supplier_address">Supplier Address</label>
                    <div class="form-group">
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" name="supplier_address" id="supplier_address2" class="form-control"
                            required>

                    </div>

                    <label class="required" for="supplier_contact">Supplier Contact </label>
                    <div class="form-group">
                        <input type="number" name="supplier_contact" id="supplier_contact2" class="form-control"
                            required minlength="10" maxlength="10">

                    </div>

                    <label class="required" for="supplier_email"> Supplier Email</label>
                    <div class="form-group">
                        <input type="email" name="supplier_email" id="supplier_email2" onfocusout='IsEmail(this.value)'
                            class="form-control" required>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="form" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {

$('#supplierForm').validate({
rules: {
   "supplier_companyname": { required: true },
   "supplier_address": { required: true },
  
    },
    submitHandler: function(form) {
        var action = "{{url('addsupplier')}}";
        $('form').attr('action',action);
        form.submit();
    }
    

});

});
function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    // return false;
    $("#email_err").html("Invalid Email ");
    $("#supplier_email").val('');
   // $("#supplier_email").focus();
  }else{
    // return true;
    $("#email_err").empty();
  }
}

function editsup(supplier_id)
    {
	
        $.get('/editsu/'+supplier_id,function(supplier){
            // alert(supplier_id);
              $("#supplier_id").val(supplier.supplier_id);
            $("#supplier_companyName2").val(supplier.supplier_companyName);
                $("#supplier_address2").val(supplier.supplier_address);
                $("#supplier_contact2").val(supplier.supplier_contact);
                $("#supplier_email2").val(supplier.supplier_email);
                $("#supplierEditModal").modal('toggle');
  
         });
    }


$('#supplierEditForm').validate({
rules: {
   "supplier_companyName2": { required: true },
   "supplier_address2": { required: true },
  
    },
    submitHandler: function(form) {
        //var hidden_id = $('#inventory_id').val();
        var action = "{{url('editsupplier')}}";
        
        $('form').attr('action',action);
        form.submit();
    }
    

});


function deletesup(supplier_id)
{

    if(confirm("Do You Really want to delete this record?"))
    {
        $.ajax({
            url:'/deles/'+supplier_id,
            type:'DELETE',
            data:{
                _token:$("input[name=_token]").val()
            },
            success:function(response)
            {
                $('#sid'+supplier_id).remove();
				alert("Suppilers Deleted Successfully");
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
} );


</script>