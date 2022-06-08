<title>All Sub Categories </title>
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
				<a class="btn btn-primary" href="{{route('subcategory.create')}}" style="border-radius: 5px;" role="button">ADD NEW SIBCATEGORY</a>
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
										<th>Categories</th>
										<th>Sub Categories</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
										@foreach($subcategories as $subcategory)
										<tr>
										<td>{{$subcategory->id}}</td>
										<td>{{$subcategory->category->name}}</td>
										<!-- hum ne category likha hain jo hamarey pass ek function ki shakal me hain likan hum () ye is k sath is liye nahi daltey q k hum koi where clause waghera kuch conditions use nahi kar rahe .. jab ap kisi function jo database ko call kartaho  eloquent ho to  us k sath  agar where ya koi aur addition ya condition add karni ho to () ye lagawo nahi to rehney do

										ye asal me ahamrey pass relation hain subcategory model me -->
										<td>{{$subcategory->name}}</td>
										<td>
										<a class="btn btn-info" href="{{route('subcategory.edit', $subcategory->id)}}">Edit</a>
										<a class="btn btn-warning" href="{{route('subcategory.destroy',$subcategory->id)}}">Delete</a>
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