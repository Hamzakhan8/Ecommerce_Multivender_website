<!doctype html>
<html lang="en">
<title>Home</title>

@include('front-end/partials/css-files')

<body>

	<!--================Header Menu Area =================-->
@include('front-end/partials/top-header')
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="home_banner_area"
    >
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3 style="color: yellow;">One Shop
							<br />For Every Electronic Device You Need</h3>
						<h4 style="color: yellow;">
							<strong >The place where you meet the products of ur choice and ur needs..
							</strong>
						</h4>
						<a class="white_bg_btn" href="{{route('allproduct')}}">View All Products</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Hot Deals Area =================-->
	<section class="hot_deals_area section_gap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{url('assets/img/product/hot_deals/deal1.jpg')}}" alt="">
						<div class="content">
							<h2>Hot Deals of Mobile Phones</h2>
							{{-- <p>shop now</p> --}}
						</div>
						{{-- <a class="hot_deal_link" href="{{route('hotDeals','clothing')}}"></a> --}}
					</div>
				</div>

				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{url('assets/img/product/hot_deals/deal1.jpg')}}" alt="">
						<div class="content">
							<h2>Best Offers on All Electronics</h2>
							{{-- <p>shop now</p> --}}
						</div>
						{{-- <a class="hot_deal_link" href="{{route('hotDeals','electronics')}}"></a> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================Ocassion =================-->
	<section class="clients_logo_area">
		<div class="container-fluid">
			<div class="row">
					<div class="main_title">
						<h2>All Categories</h2>
						<p class="text-dark">Slide For More Categories.</p>
					</div>
				</div>
				<div class="clients_slider owl-carousel">
				@foreach($category as $category)
				<div class="card">

					<div class="card-body text-center" style="color: black;">
						    <a href="{{route('category.products',$category->name)}}" style="text-decoration: none;">
							<strong style="color: crimson;">Category: </strong>
						    <h3 class="card-text">
							<strong>{{$category->name}}</strong>
					    	</h3>
					    	<br>
					    	<h5 class="text-dark">Click To Visit All Products From This Category</h5>

					    	</a>
					  </div>
					</div>

				@endforeach

			</div>
		</div>
	</section><br><br>
	<!--================Clients Logo Area =================-->
	<section class="clients_logo_area">
		<div class="container-fluid">
			<div class="row">
					<div class="main_title">
						<h2>Top Sellers</h2>
						<p class="text-dark">Who are in extremely love with your choice. Slide too see more</p>
					</div>
				</div>
				<div class="clients_slider owl-carousel">
				@foreach($user as $user)
				<div class="card">
					<div class="bg-image hover-overlay ripple" data-ripple-color="light">
					    <img src="{{asset('storage/'.$user->image_path)}}" class="img-fluid" />
					    <a href="#!">
					     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
					    </a>
					</div>

					<div class="card-body" style="color: black;">
					    <h5 class="card-title">{{$user->company}}</h5>
						    <p class="card-text">
							<strong style="color: crimson;">Location: </strong> {{$user->address}}
					    	</p>

					    	<p class="card-text">
							<strong style="color: crimson;">Mobile: </strong> {{$user->contact}}
					    	</p>

					    <a href="{{route('shop.products',$user->id)}}" class="btn btn-primary">Visit Shop</a>
					  </div>
					</div>

				@endforeach

			</div>
		</div>
	</section>
	<!--================End Clients Logo Area =================-->

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
			<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
					<h2>Featured Products</h2>
					<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>

		<div class="container">
     		<br />

     	<br/>
    		 @csrf
     		<div class="table-responsive text-center" id="table_data">
    		@include('pagination_child')
   			</div>
        </div>

    	</div>
		</div>
	</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){

 $(document).on('click', '.page-link', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
 });

 function fetch_data(page)
 {
  var _token = $("input[name=_token]").val();
  $.ajax({
      url:"{{ route('pagination.fetch') }}",
      method:"POST",
      data:{_token:_token, page:page},
      success:function(data)
      {
       $('#table_data').html(data);
      }
    });
 }

});
</script>

	@include('front-end/partials/footer')
	<!--================ End footer Area  =================-->



	@include('front-end/partials/js-file')
