			<div class="row">
					@foreach($products as $product)
					<div class="col col1">
						<div class="f_p_item">
						<div class="f_p_img">
						
						<img class="img-fluid" src="{{asset('storage/'.$product->image_path)}}" alt="">
								
								<div class="p_icon">
								<a href="{{route('add.cart')}}">
								<i class="lnr lnr-cart"></i>
								</a>
								</div>
						</div>


						<a href="#">
						<h4>{{$product->title}}</h4>
						</a>
						<h5>${{$product->price}}</h5>


						</div>
					</div>
					@endforeach
				</div>
				<div>
				{{$products->links()}}	
				</div>

				<style type="text/css">
					.f_p_img img{
						height: 200px;
					}
				</style>
				