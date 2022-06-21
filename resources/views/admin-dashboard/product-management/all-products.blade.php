<title>All Products </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')


@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   	<strong>{{$message}}</strong>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
</div>
@endif


		<div class="container-fluid">
			<div class="row mb-2 ml-1 text-light font-weight-bold">
		<a class="btn btn-primary" href="{{route('product.create')}}" style="border-radius: 5px;" role="button">ADD NEW PRODUCT</a>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table  table-striped table-hover" id="myTable">
									<thead>
									<tr>
										<th>Image</th>
										<th>Title</th>
										<th>Description</th>
										<th>User's Company</th>
										<!-- <th>Brand</th> -->
										<th>Category</th>
										<th>Sub Category</th>
										<th>Price</th>
										<!-- <th>Size</th> -->
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
										@foreach($products as $product)
										<tr>
											<td><img src="{{asset('uploads/product/'.$product->image_path)}}" height="100px" width="150px"></td>
											<td>{{$product->title}}</td>
											<td>{{$product->description}}</td>
											<td>{{$product->user->company}}</td>

											<td>{{$product->category->name}}</td>
											<td>{{$product->subcategory->name}}</td>
											<td>{{$product->price}}</td>


											<td>
											<a class="btn btn-success" href="{{route('product.edit', $product->id)}}">Edit</a>
											<a class="btn btn-danger" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
										<form method="post" action="{{route('product.destroy', $product->id)}}">
												{{method_field('delete')}}
												@csrf
											</form>
											<!-- <a class="btn btn-secondary" href="{{route('product.show', $product->id)}}">Show</a> -->
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
