@extends('admin-dashboard.layouts.master')
<title>Hall Edit</title>
@section('main-contents')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form method="post" action="{{route('hall.update',$hall->id)}} ">
				{{method_field('PATCH')}}
		  	  @csrf
				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
			    	<input type="text" class="form-control" name="name" value="{{$hall->name}}">
				  </div>

					<div class="form-group">
				    <label for="exampleInputEmail1">Address</label>
			    	<input type="text" class="form-control" name="address" value="{{$hall->address}}">
				  	</div>


				  <div class="form-group">
				    <label for="exampleInputEmail1">Contact</label>
			    	<input type="text" class="form-control" name="contact" value="{{$hall->contact}}">
				  </div>


				  <button type="submit" class="btn btn-primary">Submit</button>
			</form>			
		</div>	
	</div>
</div>

@endsection