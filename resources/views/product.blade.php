@extends('layouts.app')
@section('title', 'Product')
@section('content')


<!-- Responsive Datatable -->
<!-- BEGIN: Content-->
<head>

<style>
    .required:after {
    content:" *";
    color: red;
	 }
</style>
</head>
<meta name="csrf_token" content="{{ csrf_token() }}" />

<style>
table.dataTable.nowrap td {
    white-space: inherit !important;
}

table.dataTable.nowrap td {
    white-space: inherit !important;
}

</style>

<div class="app-content content ">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-left mb-0">Product</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
								</li>
								<li class="breadcrumb-item"><a href="{{ url('/product') }}">Product</a>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<section id="responsive-datatable">
				<div class="row">
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
							<div class="card-header border-bottom">
								<h4 class="card-title"></h4>
								<button type="button" class="btn btn-outline-primary" data-toggle="modal"
									data-target="#productModal">
									Add New Product
								</button>
							</div>
							<div style="margin:20px;">
								<table id="example" class="display nowrap stripe" style="width:100%;">
									<thead>
										<tr>
											<th>Product Name</th>
											<th>Variations</th>
											<th>Description</th>
											<th>Base Price</th>
											<th>Code</th>
											<th>Taxable</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody>

										@foreach($products as $product)
										<tr id="sid{{$product->product_id}}">
											<td>{{$product->product_name}}</td>
											<td>{{$product->variation_name}}</td>
											<td>{{$product->description}}</td>
											<td>{{$product->base_price}}</td>
											<td>{{$product->code}}</td>
											<td>{{ $product->taxable == 0 ? "Yes" : "No"}}</td>
											<td>
												<a href="javascript:void(0)"
													onclick="editproduct({{$product->product_id}})" class="fa fa-edit"
													style="font-size:24px"></a>
												<a href="javascript:void(0)"
													onclick="deleteproduct({{$product->product_id}})"
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
			</section>
		</div>
	</div>
</div>

<!-- Add Product Model -->
<div class="modal fade text-left" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">Add Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form id="productForm" name="productForm" enctype="multipart/form-data" method="post">
				@csrf
				<div class="modal-body">


					<label class="required" for="product_name">Product Name </label>
					<div class="form-group">
						<input type="text" name="product_name" id="product_name" class="form-control" required>
					</div>

					<label class="required" for="cat_id">Catagory </label>
					<div class="form-group">
						<select class="form-control" name="cat_id" id="cat_id" required>
							<option value="">Select Catagory</option>
							@foreach($categories as $categorie)
							<option value="{{$categorie->cat_id}}">{{$categorie->cat_name}}
							</option>
							@endforeach
						</select>
					</div>

					<label class="required" for="unit_id">Unit </label>

					<div class="form-group">
						<select class="form-control" name="unit_id" id="unit_id" required>
							<option value="">Select Unit</option>
							@foreach($units as $unit)
							<option value="{{$unit->unit_id}}">{{$unit->unit_name}}
							</option>
							@endforeach
						</select>
					</div>

					<label class="required"  for="variation_id">Variation </label>
					<div class="form-group">

						<select class="form-control" name="variation_id" id="variation_id" required>
							<option value="">Select Variation</option>
							@foreach($product_variation as $product_var)
							<option value="{{$product_var->variation_id}}">{{$product_var->variation_name}}
							</option>
							@endforeach
						</select>
					</div>

					<label  class="required" for="description">Product Image </label>
					<div class="form-group">

						<input type='file' class='form-control' name='image_url[]' id='image_url'
							accept=".jpg,.jpeg,.png" multiple  required/>

					</div>
					<div class="alert alert-danger alert-dismissible fade show" role="alert" id='err_img_url'
						style='display:none'>
						<div class="alert-body">
							<strong>Please choose files less or equal to Eight!</strong>
						</div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>


					<label class="required" for="description">Description </label>

					<div class="form-group">
						<input type="text" name="description" id="description" class="form-control" required> 
					</div>

					<label class="required" for="base_price">Base_Price </label>

					<div class="form-group">
						<input type="text" name="base_price" id="base_price" class="form-control" required>
					</div>




					<label class="required" for="code">Code </label>
					<div class="form-group">
						<input type="text" name="code" id="code" class="form-control" required>					</div>



					<label class="required" for="taxable">Taxable Type</label> &nbsp;&nbsp;
					<select name="taxable" id="taxable" class="form-control" required>
						<option value="">Select Option</option>
						<option value="0">Yes</option>
						<option value="1">No</option>

					</select>



				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade text-left" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">Update Products</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="productEditForm" name="productEditForm" enctype="multipart/form-data" method="post">

			
				@csrf
				<div class="modal-body">
					<input type="hidden" name="product_id" id="product_id">

					<label  class="required" for="product_name">Product Name
					</label>
					<div class="form-group">
						<input type="text" name="product_name" id="product_name2" class="form-control" required>
					</div>

					<label class="required" for="cat_id">Catagory </label>
					<div class="form-group">
						<select class="form-control" name="cat_id" id="cat_id2" required>
							<option value="">Select Catagory</option>
							@foreach($categories as $categorie)
							<option value="{{$categorie->cat_id}}">{{$categorie->cat_name}}
							</option>
							@endforeach
						</select>
					</div>

					<label  class="required" for="unit_id">Unit </label>

					<div class="form-group">
						<select class="form-control" name="unit_id" id="unit_id2" required>
							<option value="">Select Unit</option>
							@foreach($units as $unit)
							<option value="{{$unit->unit_id}}">{{$unit->unit_name}}
							</option>
							@endforeach
						</select>
					</div>

					<label class="required"  for="variation_id">Variation </label>
					<div class="form-group">
						<select class="form-control" name="variation_id" id="variation_id2" required>
							<option value="">Select Variation</option>
							@foreach($product_variation as $product_var)
							<option value="{{$product_var->variation_id}}">{{$product_var->variation_name}}
							</option>
							@endforeach
						</select>
					</div>
					<br>

					<label  class="required" for="description">Description </label>

					<div class="form-group">
						<input type="text" name="description" id="description2" class="form-control" required>
					</div>

					<label class="required" for="base_price">Base Price </label>

					<div class="form-group">
						<input type="text" name="base_price" id="base_price2" class="form-control" required>
					</div>



					<label  class="required" for="code">Code </label>
					<div class="form-group">
						<input type="text" name="code" id="code2" class="form-control" required>
					</div>

					<label class="required"  for="taxable">taxable </label>
					<div class="form-group">
						<select name="taxable" id="taxable2" class="form-control" required>
							<option value="">Select Option</option>
							<option value="0">Yes</option>
							<option value="1">No</option>
						</select>
					</div>

					<br>
					<div class="form-group">
						<label class="required"  for="description">Product Image </label>
						<input type='file' class='form-control' accept=".jpg,.jpeg,.png" name='image_url[]'
							id='image_url2' multiple > 
						{{-- <input type='hidden' class='form-control' name='old_image' id='old_image'> --}}
						<span class="text-danger" id="image-input-error"></span>
					</div>

					<div class="alert alert-danger alert-dismissible fade show" role="alert" id='err_img_up'
						style='display:none'>
						<div class="alert-body">
							<strong>Please choose files less or equal to Eight!</strong>
						</div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>
					<div class="form-group" id='list_images'>
					</div>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- <script src="jss/jquery.validate.min.js"></script> -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

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

		// $("#productForm").submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //         url:"/addpro",
        //         type:"post",
        //         data:new FormData(this),
        //         dataType:'JSON',
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success:function(response)
        //         {     
        //             alert("Data Inserted Successfully");
        //             location.reload();
        //         }
        //     });
        // });

		$(document).ready(function() {

$('#productForm').validate({
rules: {
   "product_name": { required: true },
   "cat_id": { required: true },
   "unit_id": { required: true }
    },
    submitHandler: function(form) {
       // var hidden_id = $('#inventory_id').val();
        var action = "{{url('addpro')}}";
        
        $('form').attr('action',action);
        form.submit();
    }
    

});
});

	function editproduct(product_id)
    {   
		$("#list_images").empty();
        $.get('/editp/'+product_id,function(product){
          $("#product_id").val(product.product_id);
          $("#product_name2").val(product.product_name);
		  $('#cat_id2 option[value='+product.cat_id+']').attr("selected", "selected");
		  $('#unit_id2 option[value='+product.unit_id+']').attr("selected", "selected");
		  $('#variation_id2 option[value='+product.variation_id+']').attr("selected", "selected");
		  $('#taxable2 option[value='+product.taxable+']').attr("selected", "selected");
          var pro_image = JSON.parse(product.image_url);
          var html="<div>";
          $.each(pro_image, function(key,val) {  
            html+="<span class='p-1 m-1 listimg' id='list_img_"+key+"' ><img src="+val+" height='70' width='70' class='mb-2' style='border:1px solid lightgray'><input type='hidden' value="+val+" name='old_image[]''><i class='fa fa-trash text-danger' style='font-size:20px!important' onclick='delete_row("+key+")'></i></span>";    
           });  
			html+="</div>";
			$("#list_images").append(html);
			$("#description2").val(product.description);
			$("#base_price2").val(product.base_price);
			$("#code2").val(product.code);
			$("#taxable2").val(product.taxable);
			$("#productEditModal").modal('toggle');
			});
    }
    
          function delete_row(key){
            $("#list_img_"+key).remove();
          }

          $('#image_url').change(function(){
               var fp = $("#image_url");
               var lg = fp[0].files.length; // get length
               if(lg<=8){
                $('#err_img_url').hide();
               }else{
                // alert("Please choose files less or equal to Eight!");
                $('#err_img_url').show();
                $(this).val('');
               }
               });

               $('#image_url2').change(function(){
                var numItems = $('.listimg').length;
                
               var fp = $("#image_url2");
               var lg = fp[0].files.length; // get length
               var total =  numItems + lg;
               
               if(total<=8){
                $('#err_img_up').hide();
               }else{
                // alert("Please choose files less or equal to Eight!");
                $('#err_img_up').show();
                $(this).val('');
               }
               });

 



$('#productEditForm').validate({
rules: {
   "product_name2": { required: true },
   "cat_id2": { required: true },
   "unit_id2": { required: true }
    },
    submitHandler: function(form) {
        var action = "{{url('editpro')}}";
        $('form').attr('action',action);
        form.submit();
    }


});


 	   // $("#productEditForm").submit(function(e){
    //     e.preventDefault();
        
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url:"/editpro",
    //         type:"post",
    //         data:new FormData(this),
    //         dataType:'JSON',
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         success:function(response)
    //         {     
              
    //             alert("Data Updated Successfully");
    //             location.reload();
    //         }
    //     });

    // });
	

	function deleteproduct(product_id)
	{
    if(confirm("Do you want to delete this record?"))
    {
        $.ajax({
            url:'/delep/'+product_id,
            type:'DELETE',
            data:{
                _token:$("input[name=_token]").val()
            },
            success:function(response)
            {
                $('#sid'+product_id).remove();
				alert("Product Deleted Successfully");
            }
        
        })
    }
}
</script>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
