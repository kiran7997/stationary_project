@extends('layouts.app')
@section('title', 'Units')
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
                        <h2 class="content-header-title float-left mb-0">Unit</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/units') }}">Unit</a>
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
                                <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal"
                                    data-target="#AddUnit">
                                    Add New Units
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
                                            <th>Unit Name</th>
                                            <th>Unit Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($units as $vendor)
                                        <tr id="sid{{$vendor->id}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{$vendor->unit_name}}</td>
                                            <td>{{$vendor->unit_description}}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editUnits({{$vendor->unit_id}})"
                                                    class="fa fa-secondary" style="font-size:24px"><i
                                                        class="fa fa-pencil"></i></a> &nbsp;
                                                <a href="javascript:void(0)" onclick="deleteUnits({{$vendor->unit_id}})"
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


</script>

<div class="modal fade text-left" id="AddUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Add Inventories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="UnitForm" name="UnitForm" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="location">Unit Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="unit_name" name="unit_name" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Unit Description<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="unit_description" name="unit_description" />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="EditUnits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>

            <form id="EditUnitForm" name="EditUnitForm" method="post">
                @csrf
                <input type="hidden" id="unit_id" name="unit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="location">Unit Name<span style="color:red">*</label>
                        <input type="text" class="form-control" id="unit_name1" name="unit_name" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Unit Description<span style="color:red">*</label>
                        <input type="text" class="form-control" id="unit_description1" name="unit_description" />
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Categories Modal -->

<script>
    $(document).ready(function() {

$('#UnitForm').validate({
rules: {
   "unit_name": { required: true },
   "unit_description": { required: true }
    },
    submitHandler: function(form) {
        var hidden_id = $('#unit_id').val();
        var action = "{{url('storeunit')}}";
        
        $('form').attr('action',action);
        form.submit();
    }
    

});

$('#unit_name,#unit_description').keypress(function(){
            return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)||event.charCode==32);
            
        });

});
    
function editUnits(id)
    {
        $(document).ready(function() {
            $.get('/units/'+id,function(categories){
               $("#unit_id").val(categories.unit_id);
               $("#unit_name1").val(categories.unit_name);
                $("#unit_description1").val(categories.unit_description);
                $("#EditUnits").modal('toggle');
     });
     $('#unit_name1,#unit_description1').keypress(function(){
            return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)||event.charCode==32);
            
        });
    });

$('#EditUnitForm').validate({
    rules: {
   "unit_name": { required: true },
   "unit_description": { required: true }
    },
    
    submitHandler: function(form) {
        var action = "{{url('units')}}";
        
        $('form').attr('action',action);
        
        form.submit();
    }
});
}

   
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection