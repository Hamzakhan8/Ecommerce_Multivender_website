<!doctype html>
<html lang="en">
<title>All Categories List</title>
<style>	
	.f_p_img img{height: 200px; } 
	.main_box a{text-decoration: none; color: crimson !important; font-weight: bold; font-size: 15px;}
</style>
@include('front-end/partials/css-files')

<body>

	<!--================Header Menu Area =================-->
@include('front-end/partials/top-header')
	<!--================Header Menu Area =================-->

	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid"><br><br>
				<div class="row">
					<div class="main_title pt-2 mt-2">
						<h2>All Categories</h2>
						<h3>Select Your Favorite Category</h3>
					</div>
				</div>
				<div class="row">
					@foreach($category as $category)
					<div class="col-md-2">
						<ul class="list-group">
						  <a href="{{route('category.products',$category->name)}}">
						  	<li class="list-group-item">{{$category->name}}</li><br>
						  </a>
						</ul>
					</div>
					@endforeach

					@foreach($subcategory as $category)
					<div class="col-md-2">
						<ul class="list-group">
						  <a href="{{route('subcategory.products',$category->name)}}">
						  	<li class="list-group-item">{{$category->name}}</li><br>
						  </a>
						</ul>
					</div>
					@endforeach

					
				
				</div>

			</div>
		</div>
	</section>
			
<!-- data div ends here -->


@include('front-end.partials.footer')

@include('front-end.partials.js-file')

