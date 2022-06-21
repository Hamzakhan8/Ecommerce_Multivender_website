<title>Edit Profile </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')

		
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<form method="post" action="{{route('profile.update', $user->id)}}" enctype="multipart/form-data">
				{{method_field('patch')}}
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name"  value="{{$user->name}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="text" class="form-control" name="email"  value="{{$user->email}}">
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Enter Your New Password</label>
			    <input type="text" class="form-control" name="password"  placeholder="Enter Your New  Password">
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Country</label>
			    <input type="text" class="form-control" name="country"  value="{{$user->country}}">
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">City</label>
			    <input type="text" class="form-control" name="city"  value="{{$user->city}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Company</label>
			    <input type="text" class="form-control" name="company"  value="{{$user->company}}">
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Adress</label>
			    <input type="text" class="form-control" name="address"  value="{{$user->address}}">
			  </div>			 
			  <div class="form-group">
			    <label for="exampleInputEmail1">Contact</label>
			    <input type="text" class="form-control" name="contact"  value="{{$user->contact}}">
			  </div>	
			   <div class="form-group">
			    <label for="exampleInputEmail1">CNIC</label>
			    <input type="text" class="form-control" name="cnic"  value="{{$user->cnic}}">
			  </div>
			  <!-- <div class="form-group">
			    <input type="file" class="form-control-warning" name="image" > <small class="form-text">Image Of User For Profile</small>
			  </div>	 -->
			  <div class="form-group">
			  <button type="submit" class="btn btn-primary">Submit</button>	
			  </div>
			</form>			
		</div>	
	</div>
</div>
@endsection
