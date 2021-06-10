
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-12 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">                                                
                                                <h3 class="text-primary invoice-logo">Order Information</h3>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <table style="width: 100%;border-collapse:none;">
                                        <tr style="width: 100%">
                                            <td>
                                                Order # : <span>{{$order_list->order_id}}</span>
                                            </td>
                                            <td>
                                                Order Date : <span>{{$order_list->order_date}}</span>
                                            </td>
                                            <td>
                                                Arrival Date : <span>{{$order_list->arrival_date}}</span>
                                            </td>   
                                        </tr> 
                                        <tr style="width: 100%">
                                            <td>
                                                Name : <span>{{$order_list->firstname}} {{$order_list->lastname}}</span>
                                            </td>
                                            <td>
                                                Email : <span>{{$order_list->email}}</span>
                                            </td>
                                            <td>
                                                Contact : <span>{{$order_list->phone_no}}</span>
                                            </td>                                       
                                        </tr>
                                        <tr style="width: 100%">
                                            <td>
                                                Address : <span>{{$order_list->address_type}}</span>
                                            </td>
                                            <td>
                                                Assign To : <span>{{$order_list->name}}</span>
                                            </td>   
                                        </tr>                                   
                                    </table>
                                    <!-- Header ends -->
                                </div>

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <h3 class="text-primary invoice-logo">Items</h3>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table style="width: 100%;border-collapse:none;">
                                        <tr style="width: 100%">
                                            <td><b>Item</b></td>
                                            <td><b>Qty</b></td>
                                            <td><b>Total</b></td>
                                        </tr>
                                        <?php if(count($order_item_data)>0){ ?>
                                        @foreach($order_item_data as $item)
                                        <tr style="width: 100%">
                                            <td>{{$item->product_name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>Rs.{{$item->amount}}</td>
                                        </tr>
                                        @endforeach
                                        <?php } ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
 