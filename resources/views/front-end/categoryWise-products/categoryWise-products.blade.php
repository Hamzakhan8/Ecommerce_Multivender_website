<!doctype html>
<html lang="en">
<title>Product Page</title>
<style>	.f_p_img img{height: 200px; } </style>
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
						<h2>Featured Products</h2>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>

					<div class="main_title pt-2 mt-2">
						<!-- for select -->
						<div class="form-group">
							<div class="row">
								<div class="col-md">
									<select name="category" class="form-control" id="dynamic_select" >
									  <option value="" selected>Select Your City</option>
									  @foreach($citiesall as $cities)
									  <option value="{{$cities->name}}">{{$cities->name}}</option>
									  @endforeach
									</select>
								</div>
								<div class="col-md">
					<button type="text" id="cateinput" class="btn btn-clear text-dark" disabled
					value="{{$categorytype->id}}">For Category {{$categorytype->name}} .</button>
								</div>
							</div>

						</div>
			   		</div>
				</div>
				<div class="row">
				@foreach($products as $product)
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
							<a href="{{route('shop.product.details', $product->title)}}">
								<img class="img-fluid cat" src="{{asset('uploads/product/'.$product->image_path)}}"
								 alt="product images from db">
							</a>
								<div class="p_icon">
									@if(auth()->check() && $product->likes()->where('user_id', auth()->user()->id)->where('product_id', $product->id)->count()>0)
										<button value="{{$product->id}}" id="{{$product->id}}"  class="like btn btn-danger">
										<i class="lnr lnr-heart"></i>
										</button>

									@else
										<button value="{{$product->id}}" id="{{$product->id}}" class="like btn btn-light">
										<i class="lnr lnr-heart"></i>
										</button>

									@endif
								</div>
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


@include('front-end.partials.footer')

@include('admin-dashboard/partials/jsfile')

<script>
    $(function(){
      $('#dynamic_select').on('change', function () {
          var id = $(this).val(); // get selected value
          var cat = $("#cateinput").val();
          if (id) {
            window.location.replace("http://localhost/softech/public/city/products/"+id+"/"+cat);

          }
          return false;
      });
    });


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
