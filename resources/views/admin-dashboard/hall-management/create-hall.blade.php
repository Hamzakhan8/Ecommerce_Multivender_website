<title>Hall Registration </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form method="post" action="{{route('hall.store')}} ">
		  	  @csrf
				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
			    	<input type="text" class="form-control" name="name"  placeholder="ENTER HALL NAME">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Address</label>
			    	<input type="text" class="form-control" name="address"  placeholder="ENTER HALL ADDRESS">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Contact</label>
			    	<input type="text" class="form-control" name="contact"  placeholder="ENTER CONTACT">
				  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>			
		</div>	
	</div>
</div>
@endsection