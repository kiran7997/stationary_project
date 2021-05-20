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
										<th>Inventory Address</th>
										<th>Inventory Contact</th>
										<th>Inventory Email</th>
										<th>Product Id</th>
										<th>Quantity</th>
										<th>Invntory Status</th>
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
                   	<label class="required"  for="inventory_name">Company Name </label>
                   	<div class="form-group">
                   		<input type="text" name="inventory_name" id="inventory_name" class="form-control" required>
                           <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter Company name.</div>
 
                    </div>

                    <label class="required" for="inventory_address">Inventory Address</label>
                    <div class="form-group">
                    	<input type="textarea" name="inventory_address" id="inventory_address" class="form-control" required>
                        <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Inventory Address.</div>
                    
                    </div>
                          
                    <label  class="required" for="inventory_contact">Inventory Contact </label>
                    <div class="form-group">
                       	<input type="number" name="inventory_contact" id="inventory_contact" class="form-control" required minlength="10" maxlength="10">
                           
                    </div>
                    
					<label class="required"  for="inventory_email"> Inventory Email</label>
                    <div class="form-group">
                        <input type="email" name="inventory_email" id="inventory_email" class="form-control" required>
                        <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Inventory Email.</div>

                    </div>

                    <label class="required"  for="product_id">Product Type</label> &nbsp;&nbsp;
                    <div class="form-group">
						<select name="product_id" id="product_id"  class="form-control" required>
							<option  value="">Select Option</option>
							<option value="1">Pen</option>
							<option value="2">Text Book</option>
							<option value="3">Pencil</option>
							<option value="4">Colorbox</option>
							<option value="5">Drawing Book</option>
						</select>
                        <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Select One.</div>
 
                    </div>
                    <label  class="required" for="quantity">Item Quantity </label>
                    <div class="form-group">
                    	<input type="number" name="quantity" id="quantity" class="form-control" required>
                        <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Inventory Quantity.</div>
 
                    </div>
           			<label  class="required" for="invntory_status">Inventory Status  </label>
         			<select name="invntory_status" id="invntory_status"  class="form-control" required>
       					<option value="">Select Option</option>
						<option value="Add">Add</option>
             			<option value="Minus">Minus</option>
             			<option value="Set">Set</option>
                         
        			</select>
                    <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter  One.</div>
 
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
                    <label  class="required" for="inventory_name">Comapany Name </label>
                    <div class="form-group">
                        <input type="text" name="inventory_name" id="inventory_name2" class="form-control" required>
                        
                    </div>

                    <label  class="required" for="inventory_address">Inventory Address</label>
                    <div class="form-group">
                      	<input type="text" name="inventory_address" id="inventory_address2" class="form-control" required>
                          
                    </div>
						
					<label  class="required" for="inventory_contact">Inventory Contact </label>
                    <div class="form-group">
                       	<input type="number" name="inventory_contact" id="inventory_contact2" class="form-control" required minlength="10" maxlength="10">
                           
                    </div>
						
					<label  class="required" for="inventory_email"> Inventory Email</label>
                    <div class="form-group">
                       	<input type="email" name="inventory_email" id="inventory_email2" class="form-control" required>
                           
                    </div>

                    <label class="required" for="product_id">Product Type</label> &nbsp;&nbsp;
                    <div class="form-group">
						<select name="product_id" id="product_id2"  class="form-control" required>
							<option  value="">Select Option</option>
							<option value="1">Pen</option>
							<option value="2">Text Book</option>
							<option value="3">Pencil</option>
							<option value="4">Colorbox</option>
							<option value="5">Drawing Book</option>
						</select>
                        
                    </div>
                    <label  class="required" for="quantity">Item Quantity </label>
                    <div class="form-group">
                        <input type="text" name="quantity" id="quantity2" class="form-control" required>
                        
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>  
// $("#invenForm").submit(function(e){
//   e.preventDefault();
//     let inventory_name=$("#inventory_name").val();
//   // alert(inventory_name);
//     let inventory_address=$("#inventory_address").val();
//     let inventory_contact=$("#inventory_contact").val();
//     let inventory_email=$("#inventory_email").val();
//     let product_id=$("#product_id").val();
//     let quantity=$("#quantity").val();
//     let invntory_status=$("#invntory_status").val();
//     let _token=$("input[name=_token]").val();

//     $.ajax({
//         url:"{{url('addinven')}}",
       

//         type:"post",

        
//         data:{
//             inventory_name:inventory_name,
//             inventory_address:inventory_address,
//             inventory_contact:inventory_contact,
//             inventory_email:inventory_email,
//             product_id:product_id,
//             quantity:quantity,
//             invntory_status:invntory_status,
//             _token:_token
//         },
        
//         success:function(response)
//         {
//             alert('okk');
        
//             swal({title: "Good job", text: "You clicked the button!", type: 
//                         "success"}).then(function(){ 
//                              location.reload();
//              });

            
        
//         }
//     });
// });

$(document).ready(function() {

$('#invenForm').validate({
rules: {
   "inventory_name": { required: true },
   "inventory_address": { required: true },
   "inventory_contact": { required: true }
    },
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
        $(document).ready(function() {
        $.get('/editi/'+inventory_id,function(inventories){
           
               $("#inventory_id").val(inventories.inventory_id);
               $("#inventory_name2").val(inventories.inventory_name);
               $("#inventory_address2").val(inventories.inventory_address);
               $("#inventory_contact2").val(inventories.inventory_contact);
               $("#inventory_email2").val(inventories.inventory_email);
                $("#product_id2").val(inventories.product_id);
                $("#quantity2").val(inventories.quantity);
                $("#invntory_status2").val(inventories.invntory_status);
                //alert(JSON.stringify(invntory_status));
                $("#invenEditModal").modal('toggle');
               
     });
    });

$('#invenEditForm').validate({
rules: {
   "inventory_name2": { required: true },
   "inventory_address2": { required: true },
   "inventory_contact2": { required: true }
    },
    submitHandler: function(form) {
        var action = "{{url('editinven')}}";
        $('form').attr('action',action);
        form.submit();
    }


});
}

    // $("#invenEditForm").submit(function(e){
     
    //     e.preventDefault();
    //     let inventory_id=$("#inventory_id").val();
    //     let inventory_name=$("#inventory_name2").val();
    //     let inventory_address=$("#inventory_address2").val();
    //     let inventory_contact=$("#inventory_contact2").val();
    //     let inventory_email=$("#inventory_email2").val();
    //     let product_id=$("#product_id2").val();
    //     let quantity=$("#quantity2").val();
    //     let invntory_status=$("#invntory_status2").val();
        
    //     let _token=$("input[name=_token]").val();

        
    //     $.ajax({
    //         url:"{{url('editinven')}}",
           
    //         type:"post",
    //         data:{
    //             inventory_id:inventory_id,
    //             inventory_name:inventory_name,
    //             inventory_address:inventory_address,
    //             inventory_contact:inventory_contact,
    //             inventory_email:inventory_email,
    //             product_id:product_id,
    //             quantity:quantity,
    //             invntory_status:invntory_status,
    //             _token:_token
    //         },
    //         success:function(response){
    //             Swal.fire({
	// 				icon: 'success',
	// 				title: 'Data Updated Successfully!',
	// 				showConfirmButton: true,
  					
	// 			});
    //             $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_name);
    //             $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_address);
    //             $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_contact);
    //             $('#sid' +response.id+' td:nth-child(1)').text(response.inventory_email);
    //             $('#sid' +response.id+' td:nth-child(1)').text(response.product_id);
    //             $('#sid' +response.id+' td:nth-child(2)').text(response.quantity);
    //             $('#sid' +response.id+' td:nth-child(1)').text(response.invntory_status);
              
               
    //             $("#invenEditModal").modal('toggle');
    //             $('#invenEditForm')[0].reset();
    //             location.reload();
    //         }
    //     });

    // });


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
     
        })
    }   
}
 </script>
<!-- <script>
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


</script> -->

</html>
@endsection

<script>
//     $(document).ready(function() {
//    $("#invenForm").validate();
// 	});
	</script>

<!-- <script src="jss/jquery.min.js"></script>
<script src="jss/jquery.validate.min.js"></script>
<script src="jss/invenForm.js"></script> -->