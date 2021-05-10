@extends('layouts.app')
@section('title', 'Product Variation')
@section('content')



@section('content')
<!-- Responsive Datatable -->
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Product Variation</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/roles') }}">Product Variation</a>
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
                            <div class="card-header border-bottom">
                                <h4 class="card-title"></h4>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddProductv">
                                    Add Product Variation
                                </button>
                            </div>
                            <div style="margin:20px;">
                                <table id="example" class="display nowrap stripe" style="width:100%;">
                                    <thead>
          								<tr>
            								<th>Variation ID</th>
            								<th>Variation Name</th>
											<th>Abbrevation</th>
            								<th>Add on Price</th>
            								<th>Actions</th>
          								</tr>                                
          							</thead>
            						<tbody>
										@foreach($products as $vendor)
											<tr id="sid{{$vendor->id}}">
												<td>{{$vendor->variation_id	}}</td>
												<td>{{$vendor->variation_name}}</td>
												<td>{{$vendor->variation_abbrevation}}</td>
												<td>{{$vendor->add_on_price}}</td>
												<td>
												<a href="javascript:void(0)" onclick="editProductv({{$vendor->variation_id}})"class="fa fa-secondary" style="font-size:24px"><i class="fa fa-pencil"></i></a> &nbsp;
												<a href="javascript:void(0)"  onclick="deleteProductv({{$vendor->variation_id}})"  class="fa fa-trash" style="font-size:24px;color:red"></a>
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

<!-- Add Categories Modal -->
<div class="modal fade" id="AddProductv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
        	<div class="modal-body">
            	<form  id="ProductvForm" name="ProductvForm">
           			@csrf
					<div class="form-group">
						<label for="location">Variation Name</label>
						<input type="text" class="form-control" id="variation_name" name="variation_name"/>
					</div>
                       
					<div class="form-group">
						<label for="Transport">Abbrivation</label>
						<input type="text" class="form-control" id="variation_abbrevation" name="variation_abbrevation">
					</div>

					<div class="form-group">
						<label for="Transport">Add on Price</label>
						<input type="text" class="form-control" id="variation_add_on_price" name="variation_add_on_price">
					</div>
                	<button type="submit" class="btn btn-primary">Submit</button>
            	</form>
      		</div>
    	</div>
  	</div>
</div>

<div class="modal fade text-left" id="EditProductv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
            <div class="modal-header">
                      
			</div>
                    
			<form id="EditProductvForm" name="EditProductvForm">
				@csrf
                <input type="hidden" id="variation_id" name="variation_id" >
            	<div class="modal-body">
                  	<div class="form-group">
                		<label for="location">Variation Name</label>
                		<input type="text" class="form-control" id="variation_name1" name="variation_name1"/>
            		</div>

					<div class="form-group">
						<label for="phone">Abbrivation</label>
						<input type="text" class="form-control" id="variation_abbrevation1" name="variation_abbrevation1"/>
					</div>
						
					<div class="form-group">
						<label for="Transport">Product variation Add on Price</label>
						<input type="text" class="form-control" id="variation_add_on_price1" name="variation_add_on_price1">					
					</div>
                </div>
                <div class="modal-footer">
                   	<button type="submit" class="btn btn-primary" >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


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
  
$("#ProductvForm").submit(function(e){
  e.preventDefault();
    let variation_name=$("#variation_name").val();
    let variation_abbrevation=$("#variation_abbrevation").val();
    let add_on_price=$("#variation_add_on_price").val();
    let _token=$("input[name=_token]").val();

    $.ajax({
        url:"{{url('storproductsv')}}",
        type:"post",
        data:{
            variation_name:variation_name,
            variation_abbrevation:variation_abbrevation,
            add_on_price:add_on_price,
            _token:_token
        },
        success:function(response)
        {   

            if(response)
            {
               
               $("#studentTable tbody").append('<tr><td>'+response.variation_name+'</td><td>'+ response.variation_abbrevation +'</td><td>'+response.add_on_price+'</td></tr>');
                $('#ProductvForm')[0].reset();
                alert("inserted");
                $('#AddProductv').modal('toggle');
                location.reload()


            }
        }
    });
});

    function editProductv(variation_id)
    {
        $.get('/productsv/'+variation_id,function(categories){
               $("#variation_id").val(categories.variation_id);
               $("#variation_name1").val(categories.variation_name);
                $("#variation_abbrevation1").val(categories.variation_abbrevation);
                $("#variation_add_on_price1").val(categories.add_on_price);
                $("#EditProductv").modal('toggle');
        });
    }
    $("#EditProductvForm").submit(function(e){
        e.preventDefault();
        let variation_id=$("#variation_id").val();
        let variation_name=$("#variation_name1").val();
        let variation_abbrevation=$("#variation_abbrevation1").val();
        let add_on_price=$("#variation_add_on_price1").val();
        let _token=$("input[name=_token]").val();
        
        $.ajax({
            url:"{{url('productsv')}}",
            type:"post",
            data:{
               variation_id:variation_id,
               variation_name:variation_name,
               variation_abbrevation:variation_abbrevation,
               add_on_price:add_on_price,
                _token:_token
            },
            success:function(response){
                // $('#sid' +response.id+' td:nth-child(1)').text(response.vendor_name);
                // $('#sid' +response.id+' td:nth-child(2)').text(response.location);
                // $('#sid' +response.id+' td:nth-child(3)').text(response.phone);
                // $('#sid' +response.id+' td:nth-child(4)').text(response.email);
                // $('#sid' +response.id+' td:nth-child(5)').text(response.INV_No);
                // $('#sid' +response.id+' td:nth-child(6)').text(response.Transport);

                $("#EditProductv").modal('toggle');
                $('#EditProductvForm')[0].reset();
                location.reload();
            }
        });

    });

    function deleteProductv(id)
    {
        if(confirm("Do You Really want to delete this record?"))
        {
          
            $.ajax({
                url:'/productsv/'+id,
                type:'DELETE',
                data:{
                  _token:$("input[name=_token]").val()

                },
                success:function(response)
                {
                    $('#sid'+id).remove();
                    location.reload();
                  
                }
            })
        }
    }
</script>
@endsection