<!doctype html>
<html lang="en">
<title>All Shops</title>

@include('front-end/partials/css-files')

<body>

	<!--================Header Menu Area =================-->
@include('front-end/partials/top-header')
	<!--================Header Menu Area =================-->

	<section class="feature_product_area section_gap" style="min-height: 100vh;">
		<div class="main_box">
			<div class="container-fluid">
				<br><br>

				<div class="main_title pt-2 mt-2">
						<h2>All Shpos</h2>
						<h3>Click the Shop to See it's Products</h3>
				</div>

				<div class="row">
				@foreach($user as $user)
				<div class="col-md-3" >
				<div class="card text-center">
					<div class="bg-image hover-overlay ripple" data-ripple-color="light" style="max-height: 320px !important; overflow: hidden;">
					    <!-- <img src="{{asset('storage/'.$user->image_path)}}" class="img-fluid" /> -->
					    <img src="/assets/img/banner/5.jpg" class="img-fluid" />
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

					    <a href="{{route('shop.products',$user->id)}}" class="btn btn-success">Visit Shop</a>
					  </div>
					</div>
				</div>
				@endforeach

				</div>

			</div>
		</div>
	</section>
			
<!-- data div ends here -->


@include('front-end.partials.footer')

@include('front-end.partials.js-file')
