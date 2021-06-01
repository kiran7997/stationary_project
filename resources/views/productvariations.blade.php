@extends('layouts.app')
@section('title', 'Product Variation')
@section('content')

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
                                <li class="breadcrumb-item"><a href="{{ url('/product_variation') }}">Product
                                        Variation</a>
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
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#AddProductv">
                                    Add New Product Variation
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
                                            <th>#</th>
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
                                                <a href="javascript:void(0)"
                                                    onclick="editProductv({{$vendor->variation_id}})"
                                                    class="fa fa-secondary" style="font-size:24px"><i
                                                        class="fa fa-pencil"></i></a> &nbsp;
                                                <a href="javascript:void(0)"
                                                    onclick="deleteProductv({{$vendor->variation_id}})"
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
            </section>
        </div>
    </div>
</div>
<!-- Add Categories Modal -->
<div class="modal fade" id="AddProductv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33"> Add Product Variation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <form id="ProductvForm" name="ProductvForm" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="location">Variation Name<span style="color:red">*</span></label>
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" class="form-control" id="variation_name" name="variation_name" />
                    </div>

                    <div class="form-group">
                        <label for="Transport">Abbrivation<span style="color:red">*</span></label>
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" class="form-control" id="variation_abbrevation" name="variation_abbrevation">
                    </div>

                    <div class="form-group">
                        <label for="Transport">Add on Price<span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="add_on_price" name="add_on_price" onchange="roundIt(this);">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="EditProductv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33"> Edit Product Variation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>

            <form id="EditProductvForm" name="EditProductvForm" method="post">
                @csrf
                <input type="hidden" id="variation_id" name="variation_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="location">Variation Name</label>
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" class="form-control" id="variation_name1" name="variation_name" />
                    </div>

                    <div class="form-group">
                        <label for="phone">Abbrivation</label>
                        <input oninput="this.value = this.value.replace(/[^A-Za-z0-9-,.;'&/.() ]|^ /g,'')" class="form-control" id="variation_abbrevation1"
                            name="variation_abbrevation" />
                    </div>

                    <div class="form-group">
                        <label for="Transport">Add on Price</label>
                        <input type="number" class="form-control" id="add_on_price1" name="add_on_price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
  


$(document).ready(function() {

$('#ProductvForm').validate({
rules: {
   "variation_name": { required: true },
   "variation_abbrevation": { required: true },
   "add_on_price": { required: true }
    },
    submitHandler: function(form) {
        var hidden_id = $('#variation_id').val();
        var action = "{{url('storproductsv')}}";
        
        $('form').attr('action',action);
        form.submit();
    }
    

});

});
function roundIt(ctrl) {
		var num = parseFloat(ctrl.value);
		ctrl.value = num.toFixed(2);
	}
   
function editProductv(variation_id)
    {
        $(document).ready(function() {
            $.get('/productsv/'+variation_id,function(categories){
               $("#variation_id").val(categories.variation_id);
               $("#variation_name1").val(categories.variation_name);
                $("#variation_abbrevation1").val(categories.variation_abbrevation);
                $("#add_on_price1").val(categories.add_on_price);
                $("#EditProductv").modal('toggle');
        });
        

    });
   
$('#EditProductvForm').validate({
    rules: {
   "variation_name": { required: true },
   "variation_abbrevation": { required: true },
   "add_on_price": { required: true }
    },
    
    submitHandler: function(form) { 
        var action = "{{url('productsv')}}";
        $('form').attr('action',action);
        form.submit();
    }
});

}
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