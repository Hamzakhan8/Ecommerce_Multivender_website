<title>All Cities </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')

@if($message = Session::get('success'))

<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
  	<strong>{{$message}}</strong>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
</div>

@endif

		<div class="container-fluid">
			<div class="row mb-2 ml-1 text-light font-weight-bold">
				<a class="btn btn-primary" href="{{route('city.create')}}" style="border-radius: 5px;" role="button">ADD NEW CITY</a>
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
										<th>City Name</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
										@foreach($cities as $city )
										<tr>
											<td>{{$city->id}}</td>
											<td>{{$city->name}}</td>
											<td>
										<a href="{{route('city.edit', $city->id )}}" class="btn btn-primary">Edit</a>
										<a href="javascript:void(0)" onclick="$(this).parent().find('form').submit() " class="btn btn-danger">Delete</a>

										<form action="{{route('city.destroy', $city->id )}}" method="post">
											{{method_field('delete')}}
											@csrf
										</form>
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