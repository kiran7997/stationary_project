@extends('layouts.app')
@section('title', 'Stock')
@section('content')   

    <div class="app-content content ">
      	<div class="content-overlay"></div>
      	<div class="header-navbar-shadow"></div>
        <div class="content-body"><!-- Basic Tables start -->
        	<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#stockModal">
                Add New Stock
            </button><br>
			<div class="row" id="basic-table">
  				<div class="col-12">
				    <div class="card">
				      	<div class="table-responsive">
        					<table class="table">
        						<thead>
        							<tr>
        								<th>Pdrouct ID</th>
              							<th>Item Quantity</th>
              							<th>Actions</th> 
                                	</tr>                                        
                            	</thead>
                            	<tbody>
          							@foreach($stocks as $stock)
           								<tr id="sid{{$stock->stock_id}}">
                							<td>{{$stock->product_id}}</td>
                							<td>{{$stock->item_quantity}}</td>
                							<td>
                								<a href="javascript:void(0)" onclick="editStock({{$stock->stock_id}})"  class="fa fa-edit" style="font-size:24px"></a>
        										<a href="javascript:void(0)" onclick="deletestock({{$stock->stock_id}})" class="fa fa-trash" style="font-size:24px;color:red"></a>
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

  	<hr />

	<!-- Edit Stock Model -->

	<div class="modal fade text-left" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
    	<div class="modal-dialog modal-dialog-centered" role="document">
        	<div class="modal-content">
				<div class="modal-header">
					Add Stock
				</div>
            
				<form id="stockForm" name="stockForm" style="margin: 25px;">
					@csrf
					<div class="form-group">
						<label for="product_id">Product Type</label> &nbsp;&nbsp;
						<select name="product_id" id="product_id"  class="form-control" required>
							<option >Select Option</option>
							<option value="1">Pen</option>
							<option value="2">Text Book</option>
							<option value="3">Pencil</option>
							<option value="4">Colorbox</option>
							<option value="5">Drawing Book</option>
						</select>
					</div>
					<br>
					<div class="form-group">
						<label for="item_quantity">Item Quantity </label>
						<input type="text" name="item_quantity" id="item_quantity" class="form-control" placeholder="Quantity" required>
					</div><br>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" >Submit</button>
					</div>
				</form>
        	</div>
    	</div>
	</div>

	<div class="modal fade text-left" id="stockEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">Edit Stock</div>
				<form id="stockEditForm" name="stockEditForm" style="margin: 25px;">
					@csrf
					<input type="hidden" id="stock_id" name="stock_id" >
					<div class="form-group">
						<label for="product_id">Product Type</label> &nbsp;&nbsp;
						<select name="product_id2" id="product_id2"  class="form-control" required>
							<option >Select Option</option>
							<option value="1">Pen</option>
							<option value="2">Text Book</option>
							<option value="3">Pencil</option>
							<option value="4">Colorbox</option>
							<option value="5">Drawing Book</option>
						</select>  
					</div>
					<br>
					<div class="form-group">
						<label for="item_quantity">Item Quantity </label>
						<input type="text" name="item_quantity2" id="item_quantity2" class="form-control" placeholder="Quantity" required>
					</div><br>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" >Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- AJAX insert Stock model -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

$("#stockForm").submit(function(e){
  e.preventDefault();
    let product_id=$("#product_id").val();
    
    let item_quantity=$("#item_quantity").val();

    let _token=$("input[name=_token]").val();

    $.ajax({
        url:"{{url('addstock')}}",
        dataType: 'json',
        type:"post",
        data:{
            product_id:product_id,
            item_quantity:item_quantity,
            _token:_token
        },
        
        success:function(response)
        {     alert("Data Inserted Successfully");

            if(response)
            {
                 //alert(JSON.stringify(response));
               
              //  $("#vendorTable tbody").append(response.vendor_name+'</td><td>'+ response.location +'</td><td>'+response.phone +'</td><td>'+ response.email +'</td><td>'+ response.INV_No +'</td><td>'+ response.Transport);
                $("#stockTable tbody").append('<tr><td>'+response.product_id+'</td><td>'+response.item_quantity+'</td><td>');
                $('#stockForm')[0].reset();
              
              $('#stockModal').modal('toggle');
              location.reload();
              
              
            
            }
        }
    });
});

    function editStock(stock_id)
    {
        $.get('/edit/'+stock_id,function(stock){
              $("#stock_id").val(stock.stock_id);
               $("#product_id2").val(stock.product_id);
                $("#item_quantity2").val(stock.item_quantity);
                $("#stockEditModal").modal('toggle');


        });
    }
    $("#stockEditForm").submit(function(e){
     
        e.preventDefault();
        let stock_id=$("#stock_id").val();
        let product_id=$("#product_id2").val();
        let item_quantity=$("#item_quantity2").val();
        let _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{url('editstock')}}",
            dataType: 'json',
            type:"post",
            data:{
              stock_id:stock_id,
                product_id:product_id,
                item_quantity:item_quantity,
                _token:_token
            },
            success:function(response){
                alert("Data Updated Successfully");
                $('#sid' +response.id+' td:nth-child(1)').text(response.product_id);
                $('#sid' +response.id+' td:nth-child(2)').text(response.item_quantity);
               
                $("#stockEditModal").modal('toggle');
                $('#stockEditForm')[0].reset();
                location.reload();
            }
        });

    });


function deletestock(stock_id)
{
    if(confirm("Do you want to delete this record?"))
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
            }
        })
    }
}
</script>
@endsection