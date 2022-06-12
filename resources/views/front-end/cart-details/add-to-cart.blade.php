<!doctype html>
<html lang="en">
<title>Single Product Page</title>

@include('front-end/partials/css-files')

<body>

	<!--================Header Menu Area =================-->
@include('front-end/partials/top-header')
	<!--================Header Menu Area =================-->
<br><br>

	<section class="cart_area">
		<div class="container">

			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
								@foreach(Cart::content() as $cart)
							<tr>
								<td width="30%">
									<div class="media">
										<div class="d-flex">
											<img src="{{asset('uploads/product/'.$cart->image_path)}}" height="100px;" width="100">
											<p class="ml-3">{{$cart->name}}</p>
										</div>
									</div>
								</td>
								<td>
									<h5>{{$cart->price}}</h5>

								</td>
								<td>
								<form method="get" action="{{route('update.cart', $cart->rowId)}} ">
										@csrf
									<div class="product_count">
										<input type="text" name="qty" id="sst" maxlength="12"
										value="{{$cart->qty}}" title="Quantity:" class="qty">
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
										 class="items-count" type="button">

										</button>
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
										 class="reduced items-count" type="button">

										</button>
									</div>
									<button class="btn btn-primary" type="submit">Update Cart</button>
								</form>
								</td>
								<td>
									<h5>{{$tot = $cart->price * $cart->qty}}</h5>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="cupon_text">

				@if($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert" >X </button>
					<strong> {{$message}} </strong>
				</div>
				@elseif( $message = Session::get('warning'))
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alter" >X </button>
					<strong>{{$message}}</strong>
				</div>
				@endif
			</div>


			<form method="post" action="{{route('apply.coupon')}}">
				@csrf
				<div class="row">
			<div class="row justify-content-center col-md-8 form-group" >
				<input type="text" class="form-control mr-2 col-md-4" name="coupon"  placeholder="Coupon Code">
				<button type="submit" class="btn btn-success">APPLY</button>
			</div>

				<div class="row ml-2 col-md-4 ">
		<input type="text" disabled="" class="form-control" value="{{Session::get('totalPrice')}}">
			</div>


				</div>
			</form>


		</div>
		<hr>


		<div class="row justify-content-center">
			<div class="col">
		<a class="main_btn ml" href="{{route('checkout')}}">Proceed to checkout</a>
			</div>

			<div class="col">
		<a class="main_btn ml" href="{{route('order.self')}}">Self Receive</a>
			</div>
		</div>

	</section>



@include('front-end.partials.footer')

@include('front-end.partials.js-file')
