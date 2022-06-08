@extends('admin-dashboard.layouts.master')

@section('main-contents')
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form method="post" action="{{route('brand.update',$brand->id)}}"  enctype="multipart/form-data">
				{{method_field('PATCH')}}
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name"  value="{{$brand->name}}">
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>			
		</div>	
	</div>
</div>

@endsection