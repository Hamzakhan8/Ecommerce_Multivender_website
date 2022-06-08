@extends('admin-dashboard.layouts.master')
<title>Show Product</title>
@section('main-contents')

	@if($message = Session::get('success'))
	<div class="alert alert-danger alert-dismissable fade">
	<strong>{{$message}}</strong>
	</div>	
	@endif
	

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 ">
			<img src="{{asset('storage/'.$product->image_path)}}"  height="400px;" width="450px">
					<div class="row mt-5">
						<div class="col">
							<div class="comment_list">
								@if(auth()->user()->role == 1)
								@foreach($product->comments as $comment)
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{asset('assets/img/product/single-product/review-1.png')}}" alt="">
										</div>
										<div class="media-body ml-4">
											<h4 class="text-info" >{{$comment->user->name}}</h4>
											<h6 class="text-success">{{$comment->created_at}}
												<form method="post" action="{{route('comment.destroy', $comment->id)}}" style="float: right;">
												{{method_field('delete')}}
												@csrf
												<button type="submit" name="submit" class="btn btn-danger rounded">Delete</button>
											</form>
											</h6>
										</div>
									</div>
									<p class="mt-2">{{$comment->comment}}</p>
								</div>
								<hr>
								@endforeach
								@endif
							</div>
						</div>
					</div>
			</div>
		<div class="col-md-7">
			<form enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="title"  value="{{$product->title}}" disabled="">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Description</label>
			    <input type="text" class="form-control" name="description" value="{{$product->description}}" disabled="">
			  </div>			 
			 	
			 

			  <div class="form-group">
			    <label for="exampleInputEmail1">Category</label>
			    <input type="text" class="form-control" name="price"  value="{{$product->category->name}}" disabled="">
			  </div>		 

			  <div class="form-group">
			    <label for="exampleInputEmail1">Sub Category</label>
			    <input type="text" class="form-control" name="price"  value="{{$product->subcategory->name}}" disabled="">
			  </div>		 
			  <div class="form-group">
			    <label for="exampleInputEmail1">Price</label>
			    <input type="text" class="form-control" name="price" value="{{$product->price}}" disabled="">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Delivery Charges</label>
			    <input type="text" class="form-control" name="delivery_charges" value="{{$product->delivery_charges}}" disabled="">
			  </div>
			<!--   <div class="form-group">
			    <label for="exampleInputEmail1">Color</label>
			    <input type="text" class="form-control" name="color"  value="{{$product->color}}" disabled="">
			  </div> -->
			<!--   <div class="form-group">
			    <label style="font-size: 20px;">Product Size</label>
			   <div class="col-sm-10">
			   	<label class="checkbox-inLine" > 
			   		<input type="checkbox" name="size[]" value="small" @if(in_array('small', explode(',', $product->size))) checked  @endif> Small 
			   	</label>
			   	<label class="checkbox-inLine" > 
			   		<input type="checkbox" name="size[]" value="medium" @if(in_array('medium', explode(',', $product->size))) checked @endif> Medium 
			   	</label>
			   	<label class="checkbox-inLine" > 
			   		<input type="checkbox" name="size[]" value="large" @if(in_array('large', explode(',', $product->size))) checked @endif > Large 
			   	</label>
			   </div>
			  </div>
 -->			</form>
		</div>
	</div>
</div>
			
@endsection