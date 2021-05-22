@extends('layouts.app')
@section('title', 'Inventories')
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
    		<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#invenModal">
            	Add New Inventory
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
										<th>Product Id</th>
										<th>Quantity</th>
										<th>Invntory Status</th>
										<th>Actions</th>
									</tr>                                        
								</thead>
								<tbody>
									@foreach($invens as $inven)
										<tr id="sid{{$inven->inventory_id}}">
											<td>{{$inven->supplier_companyName}}</td>
											<td>{{$inven->product_name}}</td>
											<td>{{$inven->quantity}}</td>
                             				<td>{{$inven->invntory_status}}</td>
											<td>
                                				<a href="javascript:void(0)" onclick="editinven({{$inven->inventory_id}})" class="fa fa-edit" style="font-size:24px"></a>
        										<a href="javascript:void(0)" onclick="deleteinven({{$inven->inventory_id}})" class="fa fa-trash" style="font-size:24px;color:red"></a>
                                               
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

<div class="modal fade text-left " id="invenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
   	    <div class="modal-content">
		    <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Add Inventories</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
                    
			<form id="invenForm" name="invenForm"  method='post'> 
               
                   @csrf
                 <!-- <input type="hidden" name="inventory_id" id="inventory_id"> -->
                <div class="modal-body">
                <div class="form-group">
						<label class="required" for="label_inventory_name">Company Name</label>
                     
						<select name="inventory_name" id="inventory_name"  class="form-control" required>
							<option value="">Select Option</option>
	 						@foreach($suppliers as $sup)
								<option value="{{ $sup->supplier_id }}">{{ $sup->supplier_companyName }}</option>
							@endforeach
						</select>  
					</div>             

                    <div class="form-group">
						<label class="required" for="product_id">Product Type</label> &nbsp;&nbsp;
						<select name="product_id" id="product_id"  class="form-control" required>
							<option value="">Select Option</option>
	 						@foreach($products_data as $product_data)
								<option value="{{ $product_data->product_id }}">{{ $product_data->product_name }}</option>
							@endforeach
						</select>  
					</div>
                    <label  class="required" for="quantity">Item Quantity </label>
                    <div class="form-group">
                    	<input type="number" name="quantity" id="quantity" class="form-control" required>
                       
                    </div>
           			<label  class="required" for="invntory_status">Inventory Status  </label>
         			<select name="invntory_status" id="invntory_status"  class="form-control" required>
       					<option value="">Select Option</option>
						<option value="Add">Add</option>
             			<option value="Minus">Minus</option>
             			<option value="Set">Set</option>
                         
        			</select>
                    
               	</div>
                      	
				<div class="modal-footer">
                
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Student model -->
<div class="modal fade text-left " id="invenEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Edit  Inventoeries</h5>
			</div>
      		<form id="invenEditForm" name="invenEditForm" method='post' > 
              
              @csrf
              <input type="hidden" name="inventory_id" id="inventory_id">
      			<div class="modal-body">
                  <div class="form-group">
						<label class="required" for="inventory_name">Company Name</label>
                     
						<select name="edit_inventory_name" id="inventory_name2"  class="form-control" required>
							<option value="">Select Option</option>
	 						@foreach($suppliers as $sup)
								<option value="{{ $sup->inventory_name }}">{{ $sup->supplier_companyName }}</option>
							@endforeach
						</select>  
					</div> 

                    <div class="form-group">
						<label class="required" for="product_id">Product Type</label> &nbsp;&nbsp;
						<select name="product_id" id="product_id2"  class="form-control" required>
							<option value="">Select Option</option>
	 						@foreach($products_data as $product_data)
								<option value="{{ $product_data->product_id }}">{{ $product_data->product_name }}</option>
							@endforeach
						</select>  
					</div>
                    <label  class="required" for="quantity">Item Quantity </label>
                    <div class="form-group">
                        <input type="number" name="quantity" id="quantity2" class="form-control" required>
                        
                    </div>

                    <label  class="required" for="invntory_status">Inventory Status  </label>
                    <div class="form-group">
         				<select name="invntory_status" id="invntory_status2"  class="form-control" required>
            				<option value="">Select Option</option>
             				<option value="Add">Add</option>
             				<option value="Minus">Minus</option>
             				<option value="Set">Set</option>   
                             
        				</select>
                        
                    </div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" >Submit</button>
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
           
               $("#inventory_id").val(inventories.inventory_id);
               $('#inventory_name2  option[value="'+inventories.inventory_name+'"]').prop("selected", true);
            //   $("#inventory_name2").val(inventories.inventory_name);
            //    $("#inventory_address2").val(inventories.inventory_address);
            //    $("#inventory_contact2").val(inventories.inventory_contact);
            //    $("#inventory_email2").val(inventories.inventory_email);
               $('#product_id2  option[value="'+inventories.product_id+'"]').prop("selected", true);
              //  $("#product_id2").val(inventories.product_id);
                $("#quantity2").val(inventories.quantity);
                $("#invntory_status2").val(inventories.invntory_status);
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



function deleteinven(inventory_id)
{
    if(confirm("Do You Really want to delete this record?"))
        {
        $.ajax({
            url:'/delei/'+inventory_id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'DELETE',
            data:{
                _token:$("input[name=_token]").val()
                
            },
            success:function(response)
            {
               // alert(response);
                $('#sid'+inventory_id).remove();
                alert("Inventory Deleted Successfully");
            }
     
        });
    }  
}
</script>
 


@endsection

