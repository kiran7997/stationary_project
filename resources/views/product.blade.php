@extends('layouts.app')
@section('title', 'Product')
@section('content')

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
  <style>


 label.error {
         color: #dc3545;
         font-size: 14px;
    }

</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  
  <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

   
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
                                <th>product_name</th>
                                    <th>cat_id</th>
                                    <th>unit_id</th>
                                    <th>variation_id</th>
                                    <th>image_url</th>
                                    <th>description</th>
                                    <th>base_price</th>
                                    <th>code</th>
                                    <th>taxable</th>
                                    <th>Actions</th>                                     
                            </thead>
                            </thead>
                            <tbody>

@foreach($products as $product)
<tr id="sid{{$product->product_id}}">
    <td>{{$product->product_name}}</td>
   
    <td>
        <img src="{{url('product_images/'.$product->image_url)}}" width='100'
            height="100">
    </td>
    <td>{{$product->description}}</td>
    <td>{{$product->base_price}}</td>
    
    
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
  </div>

    </div>
    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
  
  



  

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
                   
                      <div class="modal-body">
                     

                         <label for="product_name">Product_Name </label>
                          <div class="form-group">
                          <input type="text" name="product_name" id="product_name" class="form-control">
                         </div>

                         <label for="cat_id">Cat_Id </label>
                           <div class="form-group">
                        <input type="text" name="cat_id" id="cat_id" class="form-control">
                         </div>
                          
                         <label for="unit_id">Unit_Id </label>
                            
                        <div class="form-group">
                        <input type="text" name="unit_id" id="unit_id" class="form-control">
                         </div>

                         <label for="variation_id">Variation_Id </label>
                        <div class="form-group">
                        <input type="text" name="variation_id" id="variation_id" class="form-control">
                         </div>

                         <label for="description">Profile Image </label>
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
                       
                        <label for="taxable">Taxable </label>
                           <div class="form-group">
                           <input type="text" name="taxable" id="taxable" class="form-control">
                        </div>
                        
                           
                      
                        </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

<!-- Edit Product Model -->
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

                         <label for="product_name">Product_Name </label>
                          <div class="form-group">
                          <input type="text" name="product_name" id="product_name2" class="form-control">
                         </div>

                         <label for="cat_id">Cat_Id </label>
                           <div class="form-group">
                        <input type="text" name="cat_id" id="cat_id2" class="form-control">
                         </div>
                          
                         <label for="unit_id">Unit_Id </label>
                            
                        <div class="form-group">
                        <input type="text" name="unit_id" id="unit_id2" class="form-control">
                         </div>

                         <label for="variation_id">Variation_Id </label>
                        <div class="form-group">
                        <input type="text" name="variation_id" id="variation_id2" class="form-control">
                         </div>



                         <div class="form-group">
                            <label for="description">Profile Image </label>
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

                        <label for="base_price">Base_Price </label>
                           
                        <div class="form-group">
                        <input type="text" name="base_price" id="base_price2" class="form-control">
                        </div>


                       
                        <label for="code">Code </label>
                           <div class="form-group">
                         <input type="text" name="code" id="code2" class="form-control">
                        </div>
                       
                        <label for="taxable">taxable </label>
                           <div class="form-group">
                           <input type="text" name="taxable" id="taxable2" class="form-control">
                        </div>
                        
                           
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


</html>
@endsection