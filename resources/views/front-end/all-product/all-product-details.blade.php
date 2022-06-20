	<!doctype html>
	<html lang="en">
	<title>Single Product Details</title>

	@include('front-end/partials/css-files')

	<body>

		<!--================Header Menu Area =================-->
	@include('front-end/partials/top-header')
		<!--================Header Menu Area =================-->

	<section class="banner_area">
			<div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>{{$product->title}}</h2>
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a href="{{route('category.products', $product->category->name)}}"> Category {{$product->category->name}}</a>
							<a href="">Details of {{$product->title}}</a>
						</div>
					</div>
				</div>
			</div>
		</section>


	<div class="product_image_area">
			<div class="container">
				<div class="row s_product_inner">
					<div class="col-lg-6">

						@if($message = Session::get('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
	   					<strong>{{$message}}</strong>
	  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    				<span aria-hidden="true">&times;</span>
	  					</button>
					</div>
						@endif

						<div class="s_product_img pt-3">
							<img src="{{asset('uploads/product/'.$product->image_path)}}" class="img-fluid">
						</div>
					</div>
					<div class="col-md-5 offset-lg-1">
						<div class="s_product_text">
							<form action="{{route('add.cart')}}" method="POST">
								@csrf
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<input type="hidden" name="title" value="{{$product->title}}">
								<input type="hidden" name="seller_id" value="{{$product->user_id}}">
								<input type="hidden" name="price" value="{{$product->price}}">
							  <input type="hidden" name="image_path" value="{{$product->image_path}}">
								<input type="hidden" name="delivery_charges" value="{{$product->delivery_charges}}">

							<h3>{{$product->title}}</h3>
							<h2>RS: {{$product->price}}</h2>
							<ul class="list">
								<li>
									<a class="active" href="{{route('category.products',$product->category->name)}}">
									<span>Category</span> : {{$product->category->name}}</a>
								</li>
								<li>
									<a class="active" href="{{route('category.products',$product->category->name)}}">
									<span>Seller</span> : {{$product->user->company ?? $product->user->name }}</a>
								</li>
								<li>
									<a class="active" >
									<span>Contact</span> : {{$product->user->contact}}</a>
								</li>
							</ul>

							<p class="mb-5">{{$product->description}}</p>


							<div class="product_count mt-1">
								<label for="qty">Quantity:</label>
								<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">

								<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
								 class="increase items-count" type="button">
									<i class="lnr lnr-chevron-up"></i>
								</button>

								<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
								 class="reduced items-count" type="button">
									<i class="lnr lnr-chevron-down"></i>
								</button>
							</div>
							<div class="card_area">
								<textarea placeholder="Add Extra Details If You Need" class="form-control" name="extras"></textarea><br>
								@if(!Auth()->check() OR auth()->user()->id != $product->user_id)
								<button type="submit" name="Submit" class="btn btn-info">Add To Cart</button>
								@endif
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<section class="product_description_area">
			<div class="container">
				<ul class="nav nav-tabs" id="myTab" role="tablist">

					<li class="nav-item">
						<a class="nav-link active" id="contact-tab" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">

					<div class="tab-pane fade active" id="contact" role="tabpanel" aria-labelledby="contact-tab">

					</div>
				<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="row">
							<div class="col-lg-6">
								<div class="comment_list">
									@foreach($product->comments as $comment)
									<div class="review_item">
										<div class="media">
											<div class="d-flex">
												<img src="{{asset('assets/img/product/single-product/review-1.png')}}" alt="">
											</div>
											<div class="media-body">
												<h4>{{$comment->user->name}}</h4>
												<h5>{{$comment->created_at}}</h5>
												<a class="reply_btn" href="#">Reply</a>
											</div>
										</div>
										<p>{{$comment->comment}}</p>
									</div>
									@endforeach
								</div>
							</div>
							<div class="col-lg-6">
								<div class="review_box">
									<h4>Post a comment</h4>
									<form class="row contact_form" action="{{route('post.comment')}}" method="get" id="contactForm" novalidate="novalidate">
										@csrf
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control" name="comment" id="message" rows="1" placeholder="Message"></textarea>
											</div>
											<input type="hidden" name="product_id" value="{{$product->id}}">

										</div>
										<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn submit_btn">Submit Now</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



	@include('front-end.partials.footer')

	@include('front-end.partials.js-file')
