@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="app-content content ">
      	<div class="content-wrapper">
        	<div class="content-body"><!-- Basic Tables start -->
        		<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddCategory">
        			Add New Categories
              	</button>
				
				<div class="row" id="basic-table">
  					<div class="col-12">
    					<div class="card">
      						<div class="table-responsive">
        						<table class="table">
        							<thead>
        								<tr>
            								<th>Category ID</th>
                 							<th>Category Name</th>
								    		<th>Category Description</th>
                                    		<th>Actions</th>
                                		</tr>                                 
                            		</thead>
                            		<tbody>
										@foreach($categories as $vendor)
											<tr id="sid{{$vendor->id}}">
												<td>{{$vendor->cat_id}}</td>
												<td>{{$vendor->cat_name}}</td>
												<td>{{$vendor->cat_description}}</td>
												<td>
												<a href="javascript:void(0)" onclick="editCategory({{$vendor->cat_id}})" class="fa fa-secondary" style="font-size:24px"><i class="fa fa-pencil"></i></a> &nbsp;
												<a href="javascript:void(0)"  onclick="deleteCategory({{$vendor->cat_id}})"  class="fa fa-trash" style="font-size:24px;color:red"></a>
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

	<!-- Modal -->
	<div class="modal fade text-left" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
      
                </div>
                    
				<form id="CategoryForm" name="CategoryForm">
                    @csrf
                    
					<div class="modal-body">
                    	<div class="form-group">
                    		<label for="location">Category Name</label>
                    		<input type="text" class="form-control" id="cat_name" name="cat_name"/>
                    	</div>

                    	<div class="form-group">
                    		<label for="phone">Category Description</label>
                    		<input type="text" class="form-control" id="cat_description" name="cat_description"/>
                    	</div>
                	</div>
                    
					<div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
	
	<div class="modal fade text-left" id="EditCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                
				</div>
                
				<form id="EditCategoryForm" name="EditCategoryForm">
					@csrf

                    <input type="hidden" id="cat_id" name="cat_id" >
                      <div class="modal-body">
                      <div class="form-group">
                    <label for="location">Category Name</label>
                    <input type="text" class="form-control" id="cat_name1" name="cat_name1"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">Category Description</label>
                    <input type="text" class="form-control" id="cat_description1" name="cat_description1"/>
                    </div>
                   
                </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              
<!-- Add Categories Modal -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script>  

$("#CategoryForm").submit(function(e){
  e.preventDefault();
  var registerForm = $("#CategoryForm");
  var formData = registerForm.serialize();
    $.ajax({
        url:"{{url('store')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:"post",
        data:formData,
        success:function(response)
        {   
            if(response)
            {
               
               $("#studentTable tbody").append('<tr><td>'+response.cat_name+'</td><td>'+ response.cat_description +'</td><td>'+response.cat_image+'</td></tr>');
                $('#CategoryForm')[0].reset();
               
                $('#AddCategory').modal('toggle');
                location.reload();

            }
        }
    });
});
</script>

<script>
    function editCategory(cat_id)
    {
        $.get('/categories/'+cat_id,function(categories){
               $("#cat_id").val(categories.cat_id);
               $("#cat_name1").val(categories.cat_name);
                $("#cat_description1").val(categories.cat_description);
                $("#EditCategory").modal('toggle');
        });
    }
    $("#EditCategoryForm").submit(function(e){
        e.preventDefault();
        let cat_id=$("#cat_id").val();
        let cat_name=$("#cat_name1").val();
        let cat_description=$("#cat_description1").val();
        let _token=$("input[name=_token]").val();
        
        $.ajax({
            url:"{{url('categories')}}",
            type:"post",
            data:{
               cat_id:cat_id,
               cat_name:cat_name,
            cat_description:cat_description,
                _token:_token
            },
            success:function(response){
                $('#sid' +response.cat_id+' td:nth-child(1)').text(response.cat_name);
                $('#sid' +response.cat_id+' td:nth-child(2)').text(response.cat_description);
               
                $("#EditCategory").modal('toggle');
                $('#EditCategoryForm')[0].reset();
                location.reload();
            }
        });

    });

</script>
<script>
    function deleteCategory(id)
    {
        if(confirm("Do You Really want to delete this record?"))
        {
          
            $.ajax({
                url:'/categories/'+id,
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