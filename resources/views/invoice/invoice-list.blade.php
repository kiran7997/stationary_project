@extends('layouts.app')
@section('title', 'Orders')
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
        
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      
      
      <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
                                    <th>product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Color</th>
                                    <th>Actions</th>
                                </tr>                                 
                            </thead>
                            <tbody>
                            @foreach($orders as $vendor)
                                    <tr id="sid{{$vendor->order_id}}">
                                        <td>{{$vendor->product_id}}</td>
                                        <td>{{$vendor->product_name}}</td>
                                        <td>{{$vendor->product_color}}</td>
                                        
                                       
                                        <td>
                                        <a href="{{url('invoicepreview/'.$vendor['order_id'])}}" class="fa fa-eye" style="font-size:24px"></a> &nbsp;
                                        <a  href="{{url('invoiceprint/'.$vendor['order_id'])}}"  class="fa fa-print" style="font-size:24px;color:red"></a>
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
<div
                class="modal fade text-left"
                id="AddOrder"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      
                    </div>
                    <form id="OrdersForm" name="OrdersForm">
                    @csrf
                      <div class="modal-body">
                      <div class="form-group">
                    <label for="location">Order Id</label>
                    <input type="text" class="form-control" id="order_id" name="order_id"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">Product Id</label>
                    <input type="number" class="form-control" id="product_id" name="product_id"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">variation Id</label>
                    <input type="number" class="form-control" id="variation_id" name="variation_id"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">Product color</label>
                    <input type="text" class="form-control" id="product_color" name="product_color"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">Product type</label>
                    <input type="text" class="form-control" id="product_type" name="product_type"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">Product price</label>
                    <input type="number" class="form-control" id="price" name="price"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">Product qntity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"/>
                    </div>
                   <div class="form-group">
                    <label for="phone">subtotal</label>
                    <input type="number" class="form-control" id="subtotal" name="subtotal"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">order_date</label>
                    <input type="date" class="form-control" id="order_date" name="order_date"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">arrival_date</label>
                    <input type="date" class="form-control" id="arrival_date" name="arrival_date"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">taxable</label>
                    <input type="text" class="form-control" id="taxable" name="taxable"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">tax_rate</label>
                    <input type="number" class="form-control" id="tax_rate" name="tax_rate"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">tax_amount</label>
                    <input type="number" class="form-control" id="tax_amount" name="tax_amount"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">total</label>
                    <input type="number" class="form-control" id="total" name="total"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">shipping_number</label>
                    <input type="text" class="form-control" id="shipping_number" name="shipping_number"/>
                    </div>

                    <div class="form-group">
                    <label for="phone">note</label>
                    <input type="text" class="form-control" id="note" name="note"/>
                    </div>
                    
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

$("#OrdersForm").submit(function(e){
  e.preventDefault();
  var registerForm = $("#OrdersForm");
  var formData = registerForm.serialize();
    $.ajax({
        url:"{{url('storeorder')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:"post",
        data:formData,
        success:function(response)
        {   
            if(response)
            {
               
              
                $('#OrdersForm')[0].reset();
               
                $('#AddOrder').modal('toggle');
               
            }
        }
    });
});
</script>




@endsection