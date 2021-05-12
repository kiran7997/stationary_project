@extends('customer.layouts.app')
@section('title', 'Deatils')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-left mb-0">Product Details</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/customer-dashboard">Home</a>
								</li>
								<li class="breadcrumb-item"><a href="/customer-dashboard">Shop</a>
								</li>
								<li class="breadcrumb-item active">Details
								</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="content-body">
			<!-- app e-commerce details start -->
			<section class="app-ecommerce-details">
				<div class="card">
					<!-- Product Details starts -->
					<div class="card-body">
						<div class="row my-2">
							<?php $img_urls = json_decode($product_data->image_url); ?>
							<div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<?php $i = 0; ?>
										@foreach($img_urls as $img_url)
										<li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"
											style="background-color: #7367f0;" class="active"></li>
										<?php $i++; ?>
										@endforeach
									</ol>
									<div class="carousel-inner">
										<?php $i=0; for($i=0; $i<count($img_urls); $i++) { ?>
										<div class="carousel-item <?php if($i== 0) { ?> active <?php } ?>">
											<img class="d-block" src="{{url($img_urls[$i])}}" width='400' height='250'>
										</div>
										<?php } ?>

									</div>
									<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
										data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"
											style="background-color: #7367f0;"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
										data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"
											style="background-color: #7367f0;"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
							<div class="col-12 col-md-7">
								<h4>{{$product_data->product_name}}</h4>
								<div class="ecommerce-details-price d-flex flex-wrap mt-1">
									<h4 class="item-price mr-1">Rs. {{$product_data->base_price}}</h4>
								</div>
								<p class="card-text">Available - <span class="text-success">In stock</span></p>
								<p class="card-text">
									{{$product_data->description}}
								</p>
								<hr />

								<div class="d-flex flex-column flex-sm-row pt-1">
									<a href="javascript:void(0)"
										class="btn btn-primary btn-cart mr-0 mr-sm-1 mb-1 mb-sm-0">
										<svg width="14" height="14" viewBox="0 0 24 24" fill="none"
											stroke="currentColor" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" class="feather feather-shopping-cart font-medium-3">
											<circle cx="9" cy="21" r="1"></circle>
											<circle cx="20" cy="21" r="1"></circle>
											<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
											</path>
										</svg>
										<span class="add-to-cart">Add To Cart</span>
									</a>
								</div>
							</div>
						</div>
					</div>
			</section>
			<!-- app e-commerce details end -->
		</div>
	</div>
</div>
<!-- END: Content-->
</div>

<script>
	$(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
</script>

</body>
<!-- END: Body-->

</html>
@endsection