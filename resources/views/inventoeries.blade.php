@extends('layouts.app')
@section('title', 'Inventories')
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
						<h2 class="content-header-title float-left mb-0">Inventory</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
								</li>
								<li class="breadcrumb-item"><a href="{{ url('inventories') }}">Inventory</a>
								</li>
								
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">

			<div class="row" id="basic-table">
				<div class="col-12">
					<div class="card">
					<div class="card-header border-bottom">
                                <h4 class="card-title"></h4>
                                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#invenModal">
                                    Add New Inventory
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
							<table id="example" class="display nowrap table-bordered stripe text-center"
								style="width:100%;">
								<thead>
									<tr>
										<th>Company Name</th>
										<th>Product Id</th>
										<th>Quantity</th>
										<!-- <th>Inventory Status</th> -->
										<th>Created Date</th>
										<!-- <th>Actions</th> -->
									</tr>
								</thead>
								<tbody>
									@foreach($invens as $inven)
									<tr id="sid{{$inven->inventory_id}}">
										<td>{{ucwords($inven->supplier_companyName)}}</td>
										<td>{{$inven->product_name}}</td>
										<td>{{$inven->quantity}}</td>
										<!-- <td><label
												class="badge badge-success">{{ucwords($inven->invntory_status)}}</label>
										</td> -->
										<td>{{ date('Y-m-d',strtotime($inven->created_at))}}</td>
										<!-- <td>
											<a href="javascript:void(0)" onclick="editinven({{$inven->inventory_id}})"
												class="fa fa-edit" style="font-size:24px"></a>
											<a href="javascript:void(0)"
												onclick="deleteinven({{$inven->inventory_id}},{{$inven->product_id}},'{{$inven->invntory_status}}',{{$inven->quantity}})"
												class="fa fa-trash" style="font-size:24px;color:red"></a>

										</td> -->
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

<div class="modal fade text-left " id="invenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">Add Inventory</h4>
				<button type="button" class="close" onclick="myFunction()" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form id="invenForm" name="invenForm" method='post'>

				@csrf
				<!-- <input type="hidden" name="inventory_id" id="inventory_id"> -->
				<div class="modal-body">
					<div class="form-group">
						<label class="required" for="label_inventory_name">Company Name</label>

						<select name="inventory_name" id="inventory_name" class="form-control" required>
							<option value="">Select Option</option>
							@foreach($suppliers as $sup)
							<option value="{{ $sup->supplier_id }}">{{ $sup->supplier_companyName }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label class="required" for="product_id">Product Type</label> &nbsp;&nbsp;
						<select name="product_id" id="product_id" class="form-control" required>
							<option value="">Select Option</option>
							@foreach($products_data as $product_data)
							<option value="{{ $product_data->product_id }}">{{ $product_data->product_name }}</option>
							@endforeach
						</select>
					</div>
					<label class="required" for="quantity">Item Quantity </label>
					<div class="form-group">
						<input type="number" name="quantity" id="quantity"  class="form-control" required>

					</div>
					<!-- <label class="required" for="invntory_status">Inventory Status </label>
					<select name="invntory_status" id="invntory_status" class="form-control" required>
						<option value="">Select Option</option>
						<option value="add">Add</option>
						<option value="minus">Minus</option>
						<option value="set">Set</option>

					</select> -->

				</div>

				<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Student model -->
<div class="modal fade text-left " id="invenEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel33">Edit Inventory</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="invenEditForm" name="invenEditForm" method='post'>

				@csrf
				<input type="hidden" name="inventory_id" id="inventory_id">
				<div class="modal-body">
					<div class="form-group">
						<label class="required" for="label_inventory_name">Company Name</label>

						<select name="inventory_name" id="inventory_name2" class="form-control" required>
							<option value="">Select Option</option>
							@foreach($suppliers as $sup)
							<option value="{{ $sup->supplier_id }}">{{ $sup->supplier_companyName }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label class="required" for="product_id">Product Type</label> &nbsp;&nbsp;
						<select name="product_id" id="product_id2" class="form-control" required>
							<option value="">Select Option</option>
							@foreach($products_data as $product_data)
							<option value="{{ $product_data->product_id }}">{{ $product_data->product_name }}</option>
							@endforeach
						</select>
					</div>
					<label class="required" for="quantity">Item Quantity </label>
					<div class="form-group">
						<input type="number" name="quantity" id="quantity2"  class="form-control" required>

					</div>

					<label class="required" for="invntory_status">Inventory Status </label>
					<div class="form-group">
						{{-- <select name="invntory_status" id="invntory_status2" class="form-control" required>
							<option value="">Select Option</option>
							<option value="add">Add</option>
							<option value="minus">Minus</option>
							<option value="set">Set</option>
						</select> --}}
						<input type="text" readonly name="invntory_status" id="invntory_status2" class="form-control">
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
			</form>
		</div>
	</div>
</div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
function myFunction() {
    
	document.getElementById("invenForm").reset();
}
	
	$(document).ready(function() {

$('#invenForm').validate({
// rules: {
//    "inventory_name": { required: true },
//    "inventory_address": { required: true },
//    "inventory_contact": { required: true }
//     },
    submitHandler: function(form) {
        //var hidden_id = $('#inventory_id').val();
        var action = "{{url('addinven')}}";
        
        $('form').attr('action',action);
        form.submit();
    }
    
});

});



function editinven(inventory_id)
    {
       
        $.get('/editi/'+inventory_id,function(inventories){
           
			// alert(JSON.stringify(inventories));
               $("#inventory_id").val(inventories.inventory_id);
               $('#inventory_name2  option[value="'+inventories.supplier_id+'"]').prop("selected", true);
            //   $("#inventory_name2").val(inventories.inventory_name);
            //    $("#inventory_address2").val(inventories.inventory_address);
            //    $("#inventory_contact2").val(inventories.inventory_contact);
            //    $("#inventory_email2").val(inventories.inventory_email);
               $('#product_id2  option[value="'+inventories.product_id+'"]').prop("selected", true);
              //  $("#product_id2").val(inventories.product_id);
                $("#quantity2").val(inventories.quantity);
          $("#invntory_status2").val(inventories.invntory_status);
				// $('#invntory_status2  option[value="'+inventories.invntory_status+'"]').prop("selected", true);
                //alert(JSON.stringify(invntory_status));
                $("#invenEditModal").modal('toggle');
        });
    }
    

$('#invenEditForm').validate({
rules: {
   "inventory_name": { required: true },
   "inventory_address": { required: true },
  
    },
    submitHandler: function(form) {
       
        var action = "{{url('editinven')}}";
        
        $('form').attr('action',action);
        form.submit();
    }
    

});



function deleteinven(inventory_id,product_id,status,quantity)
{
	// alert(quantity);
	if(status == 'add'){
		var res = confirm("Do You Really want to delete this record ?, Decrease stock quantity!");
	}else if(status == 'minus'){
		var res = confirm("Do You Really want to delete this record ?, Increase stock quantity!");
	}else{
		var res = confirm("Do You Really want to delete this record?");
	}

    if(res==true)
        {
        $.ajax({
            url:'/delei/'+inventory_id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            data:{_token:$("input[name=_token]").val(),inventory_id:inventory_id,product_id:product_id,status:status,quantity:quantity},
            success:function(response)
            {
                $('#sid'+inventory_id).remove();
                alert("Inventory Deleted Successfully");
            }
        });
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