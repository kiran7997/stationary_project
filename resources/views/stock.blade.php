@extends('layouts.app')
@section('title', 'Stock')
@section('content')

<head>
	<style>
		.required:after {
			content: " *";
			color: red;
		}
	</style>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="app-content content ">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Stock</h2>
					<div class="breadcrumb-wrapper">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>
							</li>
							<li class="breadcrumb-item"><a href="{{ url('stock') }}">Stock</a>
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
									<th>Product Name</th>
									<th>Item Quantity</th>
									<!-- <th>Actions</th>  -->
								</tr>
							</thead>
							<tbody>
								<?php //dd($stocks);?>
								@foreach($stocks as $stock)
								<tr id="sid{{$stock->stock_id}}">

									<td>{{$stock->product_name}}</td>
									<td>{{$stock->item_quantity}}</td>
									<!-- <td>
                								<a href="javascript:void(0)" onclick="editStock(<?php echo $stock->stock_id; ?>)"  class="fa fa-edit" style="font-size:24px"></a>
        										<a href="javascript:void(0)" onclick="deletestock({{$stock->stock_id}})" class="fa fa-trash" style="font-size:24px;color:red"></a>
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

<hr />

<!-- Add Stock Model -->

<div class="modal fade text-left " id="stockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				Add Stock
			</div>

			<form id="stockForm" name="stockForm" style="margin: 25px;" method="post">
				@csrf
				<div class="form-group">
					<label class="required" for="product_id">Product Type</label> &nbsp;&nbsp;
					<select name="product_id" id="product_id2" class="form-control" required>
						<option value="">Select Option</option>
						@foreach($products_data as $product_data)
						<option value="{{ $product_data->product_id }}">{{ $product_data->product_name }}</option>
						@endforeach
					</select>
				</div>
				<br>
				<div class="form-group">
					<label class="required" for="item_quantity">Item Quantity </label>
					<input type="number" name="item_quantity" id="item_quantity" class="form-control" required>

				</div><br>
				<div class="modal-footer">
					<button type="submit" id="form" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade text-left bs-validation" id="stockEditModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">Edit Stock</div>
			<form id="stockEditForm" name="stockEditForm" style="margin: 25px;" method="post">
				@csrf
				<input type="hidden" id="stock_id" name="stock_id">
				<div class="form-group">
					<label class="required" for="product_id">Product Type</label> &nbsp;&nbsp;
					<select name="product_id" id="product_id2" class="form-control" required>
						<option value="">Select Option</option>
						@foreach($products_data as $product_data)
						<option value="{{ $product_data->product_id }}">{{ $product_data->product_name }}</option>
						@endforeach
					</select>
				</div>
				<br>
				<div class="form-group">
					<label class="required" for="item_quantity">Item Quantity </label>
					<input type="number" name="item_quantity" id="item_quantity2" class="form-control"
						placeholder="Quantity" required>
				</div><br>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- AJAX insert Stock model -->


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
	// <!--
// // $("#stockForm").submit(function(e){
// //   e.preventDefault();
// //   var $stockForm = $(this);

// //   // check if the input is valid using a 'valid' property
// //   if (!$stockForm.valid) return false;

//     // let product_id=$("#product_id").val();
    
//     // let item_quantity=$("#item_quantity").val();

//     // let _token=$("input[name=_token]").val();
// 	$('.stockForm').validate({

// 	submitHandler: function(stockForm) {

//     $.ajax({
// 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    
//         url:"{{url('addstock')}}",
//         dataType: 'json',
//         type:"post",
//         data:$('#stockForm').serialize(),
        
//         success:function(response)
//         {    
			
//                  //alert(JSON.stringify(response));
               
//               //  $("#vendorTable tbody").append(response.vendor_name+'</td><td>'+ response.location +'</td><td>'+response.phone +'</td><td>'+ response.email +'</td><td>'+ response.INV_No +'</td><td>'+ response.Transport);
//                 $("#stockTable tbody").append('<tr><td>'+response.product_id+'</td><td>'+response.item_quantity+'</td><td>');
//                 $('#stockForm')[0].reset();
// 				// Swal.fire({
  					
//   				// 	icon: 'success',
//   				// 	title: 'Data Inserted Successfully',
//   				// 	showConfirmButton: true,
  					
// 				// 	});
// 				alert('Data Inserted Successfully');

//              	$('#stockModal').modal('toggle');
// 				//location.reload();
// 		} 
              
// 		}); 
	     
// 	}
	
	
//     }); -->

$(document).ready(function() {

$('#stockForm').validate({
rules: {
   "product_id": { required: true },
   "item_quantity": { required: true },
  
    },
    submitHandler: function(form) {
        var action = "{{url('addstock')}}";
        $('form').attr('action',action);
        form.submit();
    }
    

});
});


    function editStock(stock_id)
    {
		alert(stock_id);
        $.get('/edit/'+stock_id,function(stock){
              $("#stock_id").val(stock.stock_id);
            //   $('#product_id2').val(stock.product_id);
			  $('#product_id2  option[value="'+stock.product_id+'"]').prop("selected", true);
                $("#item_quantity2").val(stock.item_quantity);
                $("#stockEditModal").modal('toggle');


        });
    }

$(document).ready(function() {

$('#stockEditForm').validate({
rules: {
   "product_id": { required: true },
   "item_quantity": { required: true },
  
    },
    submitHandler: function(form) {
        //var hidden_id = $('#inventory_id').val();
        var action = "{{url('editstock')}}";
        
        $('form').attr('action',action);
        form.submit();
    }
    

});
});

    // $("#stockEditForm").submit(function(e){
     
    //     e.preventDefault();
    //     let stock_id=$("#stock_id").val();
    //     let product_id=$("#product_id2").val();
    //     let item_quantity=$("#item_quantity2").val();
    //     let _token=$("input[name=_token]").val();

    //     $.ajax({
    //         url:"{{url('editstock')}}",
    //         dataType: 'json',
    //         type:"post",
    //         data:{
    //           stock_id:stock_id,
    //             product_id:product_id,
    //             item_quantity:item_quantity,
    //             _token:_token
    //         },
			
    //         success:function(response){

             
    //             $('#sid' +response.id+' td:nth-child(1)').text(response.product_id);
    //             $('#sid' +response.id+' td:nth-child(2)').text(response.item_quantity);
               
    //             Swal.fire({
  					
  	// 				icon: 'success',
  	// 				title: 'Data Updated Successfully',
  	// 				showConfirmButton: true,
  					
	// 				});
    //             $("#stockEditModal").modal('toggle');
    //             $('#stockEditForm')[0].reset();
    //             location.reload();
    //         }
    //     });

    // });


function deletestock(stock_id)
{

    if(confirm("Do You Really want to delete this record?"))
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
				alert("Stock Deleted Successfully");
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