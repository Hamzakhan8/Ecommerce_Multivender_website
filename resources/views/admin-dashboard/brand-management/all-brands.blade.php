<title>All Brands </title>
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
				<a class="btn btn-primary" href="{{route('brand.create')}}" style="border-radius: 5px;" role="button">ADD NEW BRAND</a>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table  table-striped table-hover" id="myTable">
									<thead>
									<tr>
										<th>ID</th>
										<th>Brand Name</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
										@foreach($brands as $brand)
										<tr>
											<td>{{$brand->id}}</td>
											<td>{{$brand->name}}</td>
											<td>
										<a href="{{route('brand.edit',$brand->id)}}" class="btn btn-primary">EDIT</a>
										<a href="{{route('brand.destroy',$brand->id)}}" class="btn btn-danger">DELETE</a>
										

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