<title>Profile Setting </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 text-center">
			<img src="{{asset('storage/'.$user->image_path)}}" alt="Profile Pic" class="img-fluid">
  			<div class="form-group mt-5">
			 
			 <a href="{{route('profile.edit',$user->id)}}" class="btn btn-lg text-light rounded btn-primary"> EDIT .</a>	
			  </div>
			</div>

		<div class="col-md-4">
			<form >
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name" disabled="" value="{{$user->name}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="text" class="form-control" name="email" disabled="" value="{{$user->email}}">
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Password</label>
			    <input type="text" class="form-control" name="password" disabled="" >
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Country</label>
			    <input type="text" class="form-control" name="country" disabled="" value="{{$user->country}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Company</label>
			    <input type="text" class="form-control" name="company" disabled="" value="{{$user->company}}">
			  </div>
			  </div>

			  <div class="col-md-4">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Role</label>
			   <input type="text" class="form-control" name="city" disabled="" value="
@if ($user->role==2) {{'Seller'}} @elseif($user->role==3) {{'Buyer'}} @else {{'Admin'}}@endif">
			  </div>	 

			  <div class="form-group">
			    <label for="exampleInputEmail1">City</label>
			   <input type="text" class="form-control" name="city" disabled="" value="{{$user->city}}">
			  </div>	
			   	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Adress</label>
			    <input type="text" class="form-control" name="address" disabled="" value="{{$user->address}}">
			  </div>			 
			  <div class="form-group">
			    <label for="exampleInputEmail1">Contact</label>
			    <input type="text" class="form-control" name="contact" disabled="" value="{{$user->contact}}">
			  </div>	
			   <div class="form-group">
			    <label for="exampleInputEmail1">CNIC</label>
			    <input type="text" class="form-control" name="cnic" disabled="" value="{{$user->cnic}}">
			  </div>	
			  </div>
			
			</form>			
		</div>	
	</div>

@endsection
