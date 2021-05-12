@extends('customer.layouts.app')
@section('title', 'Customer-dashboard')
@section('content')

<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('customer-dashboard') }}">Dashboard</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detached ">
            <div class="content-body">
                <!-- background Overlay when sidebar is shown  starts-->
                <div class="body-content-overlay"></div>
                <!-- background Overlay when sidebar is shown  ends-->
                <!-- E-commerce Search Bar Starts -->
                {{-- <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                    <div class="row mt-1">
                        <div class="col-sm-12">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control search-product" id="shop-search"
                                    placeholder="Search Product" aria-label="Search..."
                                    aria-describedby="shop-search" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i data-feather="search"
                                            class="text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <!-- E-commerce Search Bar Ends -->

                <!-- E-commerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    @foreach($product_data as $data)
                    <?php $list_img=json_decode($data->image_url); ?>

                    <div class="card ecommerce-card">
                        <div class="item-img text-center">
                            <a href="details/{{$data->product_id}}">
                                <img class="img-fluid card-img-top" src="{{ $list_img[0] }}" alt="img-placeholder" />
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div>
                                    <h6 class="item-price">RS. {{$data->base_price}}</h6>
                                </div>
                            </div>
                            <h6 class="item-name">
                                <a class="text-body" href="app-ecommerce-details.html">{{$data->product_name}}</a>
                                <span class="card-text item-company">By <a href="javascript:void(0)"
                                        class="company-name">Apple</a></span>
                            </h6>
                            
                            <p class="card-text item-description">{{$data->description}}</p>
                        </div>
                    </div>
                    @endforeach
                </section>
                <!-- E-commerce Products Ends -->

                <!-- E-commerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-2">
                                    <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link"
                                            href="javascript:void(0);">4</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
                                    <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- E-commerce Pagination Ends -->

            </div>
        </div>

    </div>
</div>


@endsection

<script>
    function getProduct(product_id)
    {
      $.get('/deatils/'+product_id,function(aproduct)
      {
      alert(product_id);

    
        });

    }
    
</script>