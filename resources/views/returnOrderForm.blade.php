@extends('layouts.app')
@section('title', 'Return Form')
@section('content')

<head>

    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
</head>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    
        <div class="content-body">
            <!-- Basic Tables start -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title"></h4>
                                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#ReturnOrderModal">
                                 Return Form
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
                           
                        </div>
                    </div>
                </div>
            </div>
        

<!-- Add Stock Model -->

<div class="modal fade text-left " id="ReturnOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title" id="myModalLabel33"> Return Form</h4>
				<button type="button" class="close"  onclick="myFunction()" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            
            <form id="returnForm" name="returnForm" method="post">
                @csrf
                <!-- <input type="hidden" name="inventory_id" id="inventory_id"> -->
                <div class="modal-body">
                <label for="products"><b>All Products</b></label>
                <select class="form-control" name="product_name" id="product_name" >
				     <option value="">Select Product Name</option>
                     <option value="all">All Data</option>					                    
                      @foreach($products_data as $data)
                     <option value="{{$data->product_id}}">{{$data->product_name}}
                      @endforeach
				      </select>
                    </div>

                    <label class="required" for="count">Odered Item Count</label>
                    <div class="form-group">
                        <input type="text" name="count" id="count" class="form-control"
                            required>

                    </div>

                    <label class="required" for="returnCount">Return  Count </label>
                    <div class="form-group">
                        <input type="number" name="returnCount" id="returnCount" class="form-control"
                            onKeyPress="if(this.value.length==10) return false;" required>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="form" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>


</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
function myFunction() {
    
	document.getElementById("returnForm").reset();
}
    $(document).ready(function() {

$('#returnForm').validate({
rules: {
   "product_name": { required: true },
   "returnCount": { required: true },
  
    },
    submitHandler: function(form) {
        var action = "{{url('returnOrder')}}";
        $('form').attr('action',action);
        form.submit();
    }
    
});
});

</script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
