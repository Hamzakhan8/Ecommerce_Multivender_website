@extends('admin-dashboard.layouts.master')
<title>City Edit</title>
@section('main-contents')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form method="post" action="{{route('city.update',$city->id)}} ">
				{{method_field('PATCH')}}
		  	  @csrf
				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
			    	<input type="text" class="form-control" name="name" value="{{$city->name}}">
				  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>			
		</div>	
	</div>
</div>

@endsection