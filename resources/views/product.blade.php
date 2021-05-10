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
  <meta name="description"
    content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
    rel="stylesheet">

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

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
  data-menu="horizontal-menu" data-col="">


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
              <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i
                    class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a
                  class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span
                    class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1"
                    data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item"
                  href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span
                    class="align-middle">Calendar</span></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic Tables start -->
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
                        <img src="{{url('product_images/'.$product->image_url)}}" width='100' height="100">
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
                        <a href="javascript:void(0)" onclick="editproduct({{$product->product_id}})" class="fa fa-edit"
                          style="font-size:24px"></a>
                        <a href="javascript:void(0)" onclick="deleteproduct({{$product->product_id}})"
                          class="fa fa-trash" style="font-size:24px;color:red"></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>




                </table>
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
          <div class="modal fade text-left" id="productModal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel33">Add Product</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <form id="productForm" name="productForm" enctype="multipart/form-data">

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
                    <select name="taxable" id="taxable" class="form-control" required>
                      <option>Select Option</option>
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
        </div>

        <!-- Edit Customer Model -->
        <div class="modal fade text-left" id="productEditModal" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel33" aria-hidden="true">
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
                    <input type='file' class='form-control' accept=".jpg,.jpeg,.png" name='image_url' id='image_url2'>
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
                  <select name="taxable" id="taxable2" class="form-control" required>
                    <option>Select Option</option>
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


          <!-- Add Product Model -->
          <div class="modal fade text-left" id="productModal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
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

                    <label for="description">Product Image </label>
                    <div class="form-group">

                      <input type='file' class='form-control' name='image_url[]' id='image_url' accept=".jpg,.jpeg,.png"
                        multiple />

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
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Edit Customer Model -->
        <div class="modal fade text-left" id="productEditModal" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel33" aria-hidden="true">
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




                  <br>

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
                  <br>
                  <div class="form-group">
                    <label for="description">Product Image </label>
                    <input type='file' class='form-control' accept=".jpg,.jpeg,.png" name='image_url[]' id='image_url2'
                      multiple>
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
      </div>

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
          $("#product_id").val(product.product_id);
          $("#product_name2").val(product.product_name);
          $("#cat_id2").val(product.cat_id);
          $("#unit_id2").val(product.unit_id);
          $("#variation_id2").val(product.variation_id);
        //   $("#image_url2").val(product.image_url);
          // $("#old_image").val(product.image_url);
          var pro_image = JSON.parse(product.image_url);
        //   var html="<table class='table' border='1'><tr><th>Image</th><th>#</th></tr>";
        //   $.each(pro_image, function(key,val) {             
        //     html+="<td><img src="+val+" height='50' width='50'><input type='hidden' value="+val+" name='old_image[]''></td><td><i class='fa fa-trash' onclick='delete_row()'></i></td></tr>";    
        //    });  
        // html+="</table>";
        var html="<div>";
          $.each(pro_image, function(key,val) {  
            html+="<span class='p-1 m-1 listimg' id='list_img_"+key+"' ><img src="+val+" height='80' width='80' class='mb-2' style='border:1px solid lightgray'><input type='hidden' value="+val+" name='old_image[]''><i class='fa fa-trash text-danger' style='font-size:20px!important' onclick='delete_row("+key+")'></i></span>";    
           });  
        html+="</div>";
        $("#list_images").append(html);
          // var img = "product_images/"+product.image_url;
          // $('#preview_image').attr('src', img);
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

               

    $("#productEditForm").submit(function(e){
        e.preventDefault();
        
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