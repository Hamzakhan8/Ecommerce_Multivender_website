<!doctype html>
<html lang="en">
<title>{{$user->company}} Products</title>

@include('front-end/partials/css-files')

<body>

	<!--================Header Menu Area =================-->
@include('front-end/partials/top-header')
	<!--================Header Menu Area =================-->

	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title pt-2 mt-2">
						<h2>Featured Products From
							<span style="color: crimson;">{{$user->company}}</span>
						</h2>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
				<div class="row">
				@foreach($products as $product)
					<div class="col col1 rounded ">
						<div class="f_p_item">
							<div class="f_p_img">
								<a href="{{route('shop.product.details', $product->title)}}">
									<img style=" width: auto; height: 200px;" class="img-fluid" src="{{asset('uploads/product/'.$product->image_path)}}" alt="product images from db">
								</a>
								<!-- <div class="p_icon">
									@if(auth()->check() && $product->likes()->where('user_id', auth()->user()->id)->where('product_id', $product->id)->count()>0)
										<button value="{{$product->id}}" id="{{$product->id}}"  class="like btn btn-danger">
										<i class="lnr lnr-heart"></i>
										</button>

									@else
										<button value="{{$product->id}}" id="{{$product->id}}" class="like btn btn-light">
										<i class="lnr lnr-heart"></i>
										</button>

									@endif
								</div> -->
							</div>
							<a href="{{route('shop.product.details', $product->title)}}">
								<h4>{{$product->title}}</h4>
							</a>
							<h5 style="color: black;">RS: {{$product->price}}</h5>
							<h5 style="color: red;">Category : {{$product->category->name}}</h5>
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

<script type="text/javascript">
		$(document).ready(function(){
			$('.like').click(function(e){


				var like =  $(this).val();

 			$.ajax({
            type: 'GET',
            url:'{{url("product/like/")}}'+'/'+like ,
            // data: {like: '2'},
            dataType: 'html',
            success: function(data){
                if(data=='3'){
                	alert('Please Login First');
                	window.location.href = "{{route('login')}}";
                }
                if(data=='1'){
                	alert('Product liked');
                	console.log($(e.target).attr('id'));
                	$('#'+$(e.target).attr('id')).removeClass('btn-light');
                	$('#'+$(e.target).attr('id')).addClass('btn-danger');
                }
                if(data=='2'){
                	alert(' u unliked the product');
                	$('#'+$(e.target).attr('id')).removeClass('btn-danger');
                	$('#'+$(e.target).attr('id')).addClass('btn-light');
                }

            }
        });
        });
				});
	</script>
