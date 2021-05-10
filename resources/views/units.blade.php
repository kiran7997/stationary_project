@extends('layouts.app')
@section('title', 'Units')
@section('content')
    <div class="app-content content ">
      	<div class="content-overlay"></div>
      	<div class="header-navbar-shadow"></div>
        <div class="content-body"><!-- Basic Tables start -->
        	<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddUnit">
        		Add New Units
            </button>
			<div class="row" id="basic-table">
  				<div class="col-12">
   					<div class="card">
      					<div class="table-responsive">
        					<table class="table">
								<thead>
									<tr>
										<th>Unit ID</th>
										<th>Unit Name</th>
										<th>Unit Description</th>
										<th>Actions</th>
									</tr>
								</thead>
          						<tbody>
              						@foreach($units as $vendor)
            							<tr id="sid{{$vendor->id}}">
											<td>{{$vendor->unit_id}}</td>
											<td>{{$vendor->unit_name}}</td>
											<td>{{$vendor->unit_description}}</td>
											<td>
												<a href="javascript:void(0)" onclick="editUnits({{$vendor->unit_id}})" class="fa fa-secondary" style="font-size:24px"><i class="fa fa-pencil"></i></a> &nbsp;
												<a 	href="javascript:void(0)"  onclick="deleteUnits({{$vendor->unit_id}})"  class="fa fa-trash" style="font-size:24px;color:red"></a>
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
  	<div class="modal fade text-left" id="AddUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
        	<div class="modal-content">
                <div class="modal-header">
                </div>

                <form id="UnitForm" name="UnitForm">
                    @csrf
                    <div class="modal-body">
                    	<div class="form-group">
                          	<label for="location">Unit Name</label>
                          	<input type="text" class="form-control" id="unit_name" name="unit_name"/>
                      	</div>
						<div class="form-group">
							<label for="phone">Unit Description</label>
							<input type="text" class="form-control" id="unit_description" name="unit_description"/>
						</div>
                	</div>
                    
					<div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="EditUnits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                
				<form id="EditUnitForm" name="EditUnitForm">
					@csrf
                    <input type="hidden" id="unit_id" name="unit_id" >                    
                    <div class="modal-body">
                    	<div class="form-group">
                			<label for="location">Category Name</label>
                			<input type="text" class="form-control" id="unit_name1" name="unit_name1"/>
            			</div>
						<div class="form-group">
							<label for="phone">Category Description</label>
							<input type="text" class="form-control" id="unit_description1" name="unit_description1"/>
						</div><br>
                	</div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
        	</div>
        </div>
    </div>
	<!-- Add Categories Modal -->

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>  
$("#UnitForm").submit(function(e){
  e.preventDefault();
  var registerForm = $("#UnitForm");
  var formData = registerForm.serialize();
    $.ajax({
        url:"{{url('storeunit')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:"post",
        data:formData,
        success:function(response)
        {   
            if(response)
            {
               $("#studentTable tbody").append('<tr><td>'+response.cat_name+'</td><td>'+ response.cat_description +'</td><td>'+response.cat_image+'</td></tr>');
                $('#UnitForm')[0].reset();
                $('#AddUnit').modal('toggle');
                location.reload();
            }
        }
    });
});
</script>
<!-- AJAX Update Unit model -->
<script>
    function editUnits(id)
    {
        $.get('/units/'+id,function(categories){
               $("#unit_id").val(categories.unit_id);
               $("#unit_name1").val(categories.unit_name);
                $("#unit_description1").val(categories.unit_description);
                $("#EditUnits").modal('toggle');
        });
    }
    $("#EditUnitForm").submit(function(e){
        e.preventDefault();
        let unit_id=$("#unit_id").val();
        let unit_name=$("#unit_name1").val();
        let unit_description=$("#unit_description1").val();
        let _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{url('units')}}",
            type:"post",
            data:{
                unit_id:unit_id,
                unit_name:unit_name,
                unit_description:unit_description,
                _token:_token
            },
            success:function(response){
                $('#sid' +response.id+' td:nth-child(1)').text(response.unit_name);
                $('#sid' +response.id+' td:nth-child(2)').text(response.unit_description);
                $("#EditUnits").modal('toggle');
                $('#EditUnitForm')[0].reset();
                location.reload()
            }
        });
    });
</script>
<script>
    function deleteUnits(id)
    {
        if(confirm("Do You Really want to delete this record?"))
        {
            $.ajax({
                url:'/units/'+id,
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
</html>     
@endsection