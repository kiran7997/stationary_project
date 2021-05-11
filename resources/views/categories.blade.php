@extends('layouts.app')
@section('title', 'Categories')
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
                        <h2 class="content-header-title float-left mb-0">Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/catagories') }}">Category</a>
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
                                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#AddCategory">
                                    Add New Categories
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
                
                                <table id="example" class="display nowrap stripe" style="width:100%;">
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
            </section>
        </div>
    </div>
</div>


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