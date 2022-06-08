<title>User Registration </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')


<div class="container-fluid">

	@if($errors->any())
	<div class="alert alert-danger" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span></button>
	@foreach($errors->all() as $error)
  	<strong>Warning !</strong> {{$error}}<br>
	@endforeach
	</div>
	@endif
	
						
	<div class="row">
		<div class="col-md-5">
			<form method="post" action="{{route('user.store')}}" enctype="multipart/form-data" >
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name"  >
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="text" class="form-control" name="email" >
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Password</label>
			    <input type="text" class="form-control" name="password" >
			  </div>
  			  <div class="form-group">
			    <label for="exampleInputEmail1">Country</label>
			    <input type="text" class="form-control" name="country"  >
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">City</label>
			    <input type="text" class="form-control" name="city"  >
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Address</label>
			    <input type="text" class="form-control" name="address"  >
			  </div>	
			</div>
		<div class="col-md-5">
			<div class="form-group">
			    <label for="exampleInputEmail1">Company</label>
			    <input type="text" class="form-control" name="company"  >
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Contact</label>
			    <input type="text" class="form-control" name="contact"  >
			  </div>	
			   <div class="form-group">
			    <label for="exampleInputEmail1">CNIC</label>
			    <input type="text" class="form-control" name="cnic"  >
			  </div>
			 	

			  <div class="form-group">
			    <label for="exampleInputEmail1">Role</label>
			  <select class="form-control" name="role">
			  	<option value="2" > Seller</option>
			  	<option value="3" > Buyer</option>
			  </select>
			  </div><br>
			  <div class="form-group">
			  <button type="submit" class="btn btn-primary">Submit</button>	
			  </div>
			</form>			
		</div>	
	</div>
</div>

@endsection