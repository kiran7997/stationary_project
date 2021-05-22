@extends('layouts.app')
@section('title', 'Suppliers')
@section('content')
<head>

<style>
     .required:after {
    content:" *";
    color: red;
	 }
</style>
</head>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    	<div class="content-body"><!-- Basic Tables start -->
    		<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#supplierModal">
            	Add New Suppliers
        	</button><br>
			<div class="row" id="basic-table">
  				<div class="col-12">
    				<div class="card">
                        <br>
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
                                <br>
      					<div class="table-responsive">
        					<table id="example" class="table">
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
                                				<a href="javascript:void(0)" onclick="editsup({{$sup->supplier_id}})" class="fa fa-edit" style="font-size:24px"></a>
        										<a href="javascript:void(0)" onclick="deletesup({{$sup->supplier_id}})" class="fa fa-trash" style="font-size:24px;color:red"></a>
                                               
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

<div class="modal fade text-left " id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
    	<div class="modal-dialog modal-dialog-centered" role="document">
        	<div class="modal-content">
				<div class="modal-header">
					Add Suppliers
				</div>
            
				<form id="supplierForm" name="supplierForm"  method="post">
                @csrf
                 <!-- <input type="hidden" name="inventory_id" id="inventory_id"> -->
                <div class="modal-body">
                   	<label class="required"  for="supplier_companyName">Company Name </label>
                   	<div class="form-group">
                   		<input type="text" name="supplier_companyName" id="supplier_companyName" class="form-control" required>
                          
                    </div>

                    <label class="required" for="supplier_address">Supplier Address</label>
                    <div class="form-group">
                    	<input type="textarea" name="supplier_address" id="supplier_address" class="form-control" required>
                       
                    </div>
                          
                    <label  class="required" for="supplier_contact">Supplier Contact </label>
                    <div class="form-group">
                       	<input type="number" name="supplier_contact" id="supplier_contact" class="form-control" required minlength="10" maxlength="10">
                           
                    </div>
                    
					<label class="required"  for="supplier_email"> Supplier Email</label>
                    <div class="form-group">
                        <input type="email" name="supplier_email" id="supplier_email" class="form-control" required>

                    </div>

					<div class="modal-footer">
						<button type="submit" id="form" class="btn btn-primary" >Submit</button>
					</div>
				</form>
        	</div>
    	</div>
	</div>

<!-- Edit Suppiler Model -->

<div class="modal fade text-left " id="supplierEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
    	<div class="modal-dialog modal-dialog-centered" role="document">
        	<div class="modal-content">
				<div class="modal-header">
					Add Suppliers
				</div>
            
				<form id="supplierForm" name="supplierForm"  method="post">
                @csrf
                 <!-- <input type="hidden" name="inventory_id" id="inventory_id"> -->
                <div class="modal-body">
                   	<label class="required"  for="supplier_companyName">Company Name </label>
                   	<div class="form-group">
                   		<input type="text" name="supplier_companyName" id="supplier_companyName" class="form-control" required>
                          
                    </div>

                    <label class="required" for="supplier_address">Supplier Address</label>
                    <div class="form-group">
                    	<input type="textarea" name="supplier_address" id="supplier_address" class="form-control" required>
                       
                    </div>
                          
                    <label  class="required" for="supplier_contact">Supplier Contact </label>
                    <div class="form-group">
                       	<input type="number" name="supplier_contact" id="supplier_contact" class="form-control" required minlength="10" maxlength="10">
                           
                    </div>
                    
					<label class="required"  for="supplier_email"> Supplier Email</label>
                    <div class="form-group">
                        <input type="email" name="supplier_email" id="supplier_email" class="form-control" required>

                    </div>

					<div class="modal-footer">
						<button type="submit" id="form" class="btn btn-primary" >Submit</button>
					</div>
				</form>
        	</div>
    	</div>
	</div>

<!-- end -->
<!-- <div class="modal fade text-left " id="supplierEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
    	<div class="modal-dialog modal-dialog-centered" role="document">
        	<div class="modal-content">
				<div class="modal-header">
					Edit Suppliers
				</div>
            
				<form id="supplierEditForm" name="supplierEditForm"   method="post">
                @csrf
                 <input type="hidden" name="supplier_id" id="supplier_id">
                <div class="modal-body">
                   	<label class="required"  for="supplier_companyName">Company Name </label>
                   	<div class="form-group">
                   		<input type="text" name="supplier_companyName" id="supplier_companyName2" class="form-control" required>
                          
                    </div>

                    <label class="required" for="supplier_address">Supplier Address</label>
                    <div class="form-group">
                    	<input type="textarea" name="supplier_address" id="supplier_address2" class="form-control" required>
                       
                    </div>
                          
                    <label  class="required" for="supplier_contact">Supplier Contact </label>
                    <div class="form-group">
                       	<input type="number" name="supplier_contact" id="supplier_contact2" class="form-control" required minlength="10" maxlength="10">
                           
                    </div>
                    
					<label class="required"  for="supplier_email"> Supplier Email</label>
                    <div class="form-group">
                        <input type="email" name="supplier_email" id="supplier_email2" class="form-control" required>

                    </div>

					<div class="modal-footer">
						<button type="submit" id="form" class="btn btn-primary" >Submit</button>
					</div>
				</form>
        	</div>
    	</div>
	</div> -->


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


function editsup(supplier_id)
    {
		// alert(supplier_id);
        // $.get('/editsu/'+supplier_id,function(supplier){
        //       $("#supplier_id").val(supplier.supplier_id);
        //     $("#supplier_companyName2").val(supplier.supplier_companyName);
        //         $("#supplier_address2").val(supplier.supplier_address);
        //         $("#supplier_contact2").val(supplier.supplier_contact);
        //         $("#supplier_email2").val(supplier.supplier_email);
                $("#supplierEditModal").modal('toggle');
     //   $('#product_id2').val(stock.product_id);
			//   $('#supplier_companyname2  option[value="'+supplier.supplier_companyname+'"]').prop("selected", true);
       

        // });
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
 