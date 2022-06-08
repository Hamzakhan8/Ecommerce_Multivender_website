<title>All Halls </title>
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
				<a class="btn btn-primary" href="{{route('hall.create')}}" style="border-radius: 5px;" role="button">ADD NEW HALL</a>
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
										<th>Name</th>
										<th>Address</th>
										<th>Contact</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
										@foreach($hall as $hall )
										<tr>
											<td>{{$hall->id}}</td>
											<td>{{$hall->name}}</td>
											<td>{{$hall->address}}</td>
											<td>{{$hall->contact}}</td>
											<td>
										<a href="{{route('hall.edit', $hall->id )}}" class="btn btn-primary">Edit</a>
										<a href="javascript:void(0)" onclick="$(this).parent().find('form').submit() " class="btn btn-danger">Delete</a>

										<form action="{{route('hall.destroy', $hall->id )}}" method="post">
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