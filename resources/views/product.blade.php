@extends('layouts.app')
@section('title', 'Product')
@section('content')

    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    
                    
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrumb-right">
              <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Tables start -->
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#productModal">
                Add New Product
              </button><br>
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      
      
      <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
                                    <th>Product</th>
                                    <th>Product Name</th>
                                    <th>Catagory</th>
                                    <th>Unit</th>
                                    <th>Variation</th>
                                    <th>Description</th>
                                    <th>Base Price</th>
                                    <th>Code</th>
                                    <th>Taxable</th>
                                    <th>Actions</th>                                     
                            </thead>
                            </thead>
                            <tbody>

@foreach($products as $product)
<tr id="sid{{$product->product_id}}">
<td>
        <img src="{{url('product_images/'.$product->image_url)}}" width='100'
            height="100">
    </td>
    <td>{{$product->product_name}}</td>
    <td>{{$product->cat_id}}</td>
    <td>{{$product->unit_id}}</td>
    <td>{{$product->variation_id}}</td>
  
    <td>{{$product->description}}</td>
    <td>{{$product->base_price}}</td>
    <td>{{$product->code}}</td>
    <td>{{$product->taxable}}</td>
    <td>
        <a href="javascript:void(0)" onclick="editproduct({{$product->product_id}})"
            class="fa fa-edit" style="font-size:24px"></a>
        <a href="javascript:void(0)" onclick="deleteproduct({{$product->product_id}})"
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
   </div>
      </div>
    </div>
      

  <hr />
  

<!-- Add Product Model -->
    <div class="modal fade text-left"
                id="productModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel33">Add Product</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <form id="productForm" name="productForm" enctype="multipart/form-data">
                    @csrf
                      <div class="modal-body">
                     

                         <label for="product_name">Product Name </label>
                          <div class="form-group">
                          <input type="text" name="product_name" id="product_name" class="form-control">
                         </div>

                         <label for="cat_id">Catagory </label>
                           <div class="form-group">
                        <input type="text" name="cat_id" id="cat_id" class="form-control">
                         </div>
                          
                         <label for="unit_id">Unit </label>
                            
                        <div class="form-group">
                        <input type="text" name="unit_id" id="unit_id" class="form-control">
                         </div>

                         <label for="variation_id">Variation </label>
                        <div class="form-group">
                        <input type="text" name="variation_id" id="variation_id" class="form-control">
                         </div>

                         <label for="description">Product Image </label>
                            <div class="form-group">
                            
                            <input type='file' class='form-control' name='image_url' id='image_url'
                                accept=".jpg,.jpeg,.png" />
                        </div>
                        
                
                        <label for="description">Description </label>
                            
                        <div class="form-group">
                        <input type="text" name="description" id="description" class="form-control">
                        </div>

                        <label for="base_price">Base_Price </label>
                           
                        <div class="form-group">
                        <input type="text" name="base_price" id="base_price" class="form-control">
                        </div>

                    
                     
                       
                        <label for="code">Code </label>
                           <div class="form-group">
                         <input type="text" name="code" id="code" class="form-control">
                        </div>
                       
                     
                        
                        <label for="taxable">Taxable Type</label> &nbsp;&nbsp;
         <select name="taxable" id="taxable"  class="form-control" required>
            <option >Select Option</option>
             <option value="0">Yes</option>
             <option value="1">No</option>
            
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

<!-- Edit Customer Model -->
 <div class="modal fade text-left"
                id="productEditModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel33">Add Products</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form id="productEditForm" name="productEditForm" enctype="multipart/form-data">
                   
                      <div class="modal-body">
                     
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">

                         <label for="product_name">Product Name </label>
                          <div class="form-group">
                          <input type="text" name="product_name" id="product_name2" class="form-control">
                         </div>

                         <label for="cat_id">Catagory </label>
                           <div class="form-group">
                        <input type="text" name="cat_id" id="cat_id2" class="form-control">
                         </div>
                          
                         <label for="unit_id">Unit</label>
                            
                        <div class="form-group">
                        <input type="text" name="unit_id" id="unit_id2" class="form-control">
                         </div>

                         <label for="variation_id">Variation</label>
                        <div class="form-group">
                        <input type="text" name="variation_id" id="variation_id2" class="form-control">
                         </div>



                         <div class="form-group">
                            <label for="description">Product Image </label>
                            <input type='file' class='form-control' accept=".jpg,.jpeg,.png" name='image_url'
                                id='image_url2'>
                            <input type='hidden' class='form-control' name='old_image' id='old_image'>
                            <span class="text-danger" id="image-input-error"></span>
                            <img id="preview_image" width='100' height="100">
                        </div>
                        <br>






<!-- 
                         <label for="description">Profile Image </label>
                            
                            <div class="form-group">
                            <input type='file' class='form-control' name='image_url' id='image_url2'
                                accept=".jpg,.jpeg,.png" />
                                <input type='hidden' class='form-control' name='old_image' id='old_image'>
                            <span class="text-danger" id="image-input-error"></span>
                            <img id="preview_image" width='100' height="100">
                        </div> -->
                        
                
                        <label for="description">Description </label>
                            
                        <div class="form-group">
                        <input type="text" name="description" id="description2" class="form-control">
                        </div>

                        <label for="base_price">Base Price </label>
                           
                        <div class="form-group">
                        <input type="text" name="base_price" id="base_price2" class="form-control">
                        </div>


                       
                        <label for="code">Code </label>
                           <div class="form-group">
                         <input type="text" name="code" id="code2" class="form-control">
                        </div>
                       
                        
                         
                        <label for="taxable">Taxable Type</label> &nbsp;&nbsp;
         <select name="taxable" id="taxable2"  class="form-control" required>
            <option >Select Option</option>
             <option value="0">Yes</option>
             <option value="1">No</option>
            
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








    <!-- Student model -->
    <!-- <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>

                </div>
                <div class="modal-body">

                    <form id="productForm" name="productForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Product_Name </label>
                            <input type="text" name="product_name" id="product_name" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="cat_id">cat_id </label>
                            <input type="text" name="cat_id" id="cat_id" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="unit_id">unit_id </label>
                            <input type="text" name="unit_id" id="unit_id" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="variation_id">variation_id </label>
                            <input type="text" name="variation_id" id="variation_id" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="description">Profile Image </label>
                            <input type='file' class='form-control' name='image_url' id='image_url'
                                accept=".jpg,.jpeg,.png" />
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="description">description </label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="base_price">base_price </label>
                            <input type="text" name="base_price" id="base_price" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="code">code </label>
                            <input type="text" name="code" id="code" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="taxable">taxable </label>
                            <input type="text" name="taxable" id="taxable" class="form-control">
                        </div><br>


                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productEditForm" name="productEditForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group">
                            <label for="product_name">Product_Name </label>
                            <input type="text" name="product_name" id="product_name2" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="cat_id">cat_id </label>
                            <input type="text" name="cat_id" id="cat_id2" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="unit_id">unit_id </label>
                            <input type="text" name="unit_id" id="unit_id2" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="variation_id">variation_id </label>
                            <input type="text" name="variation_id" id="variation_id2" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="description">Profile Image </label>
                            <input type='file' class='form-control' accept=".jpg,.jpeg,.png" name='image_url'
                                id='image_url2'>
                            <input type='hidden' class='form-control' name='old_image' id='old_image'>
                            <span class="text-danger" id="image-input-error"></span>
                            <img id="preview_image" width='100' height="100">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="description">description </label>
                            <input type="text" name="description" id="description2" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="base_price">base_price </label>
                            <input type="text" name="base_price" id="base_price2" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="code">code </label>
                            <input type="text" name="code" id="code2" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="taxable">taxable</label>
                            <input type="text" name="taxable" id="taxable2" class="form-control">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div> --> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $("#productForm").submit(function(e){
            e.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:"/addpro",
                type:"post",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response)
                {     
                    alert("Data Inserted Successfully");
                    location.reload();
                }
            });
        });

    </script>

    <script>
    
        function editproduct(product_id)
    {   
        $.get('/editp/'+product_id,function(product){
          alert(JSON.stringify(product)); 
          $("#product_id").val(product.product_id);
          $("#product_name2").val(product.product_name);
          $("#cat_id2").val(product.cat_id);
          $("#unit_id2").val(product.unit_id);
          $("#variation_id2").val(product.variation_id);
        //   $("#image_url2").val(product.image_url);
          $("#old_image").val(product.image_url);
          var img = "product_images/"+product.image_url;
          $('#preview_image').attr('src', img);
          $("#description2").val(product.description);
          $("#base_price2").val(product.base_price);
          $("#code2").val(product.code);
          $("#taxable2").val(product.taxable);
          $("#productEditModal").modal('toggle');
        });
    }
    $("#productEditForm").submit(function(e){
        e.preventDefault();
        // let product_id=$("#product_id").val();
        // let product_name=$("#product_name2").val();
        // let cat_id=$("#cat_id2").val();
        // let unit_id=$("#unit_id2").val();
        // let variation_id=$("#variation_id2").val();
        // let image_url=$("#image_url2").val();
        // let description=$("#description2").val();
        // let base_price=$("#base_price2").val();
        // let code=$("#code2").val();
        // let taxable=$("#taxable2").val();
        // let _token=$("input[name=_token]").val();

        // $.ajax({
        //     url:"{{url('editpro')}}",
        //     type:"post",
        //     data:{
        //       product_id:product_id,
        //       cat_id:cat_id,
        //       unit_id:unit_id,
        //       variation_id:variation_id,
        //       image_url:image_url,
        //       description:description,
        //       base_price:base_price,
        //       image_url:image_url,
        //       code:code,
        //       taxable:taxable,
        //       _token:_token
        //     },
        //     success:function(response){
        //         alert("Data Updated Successfully");
        //         // location.reload();
        //     }
        // });
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:"/editpro",
            type:"post",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {     
              
                alert("Data Updated Successfully");
                location.reload();
            }
        });

    });

    </script>

   <script>
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
            }
        
        })
    }
}
    </script>
    <script src="jss/jquery.min.js"></script>
    <script src="jss/jquery.validate.min.js"></script>
@endsection