@extends('admin-dashboard.layouts.master')
<title>Edit User</title>
@section('main-contents')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-5">
			<form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
				{{method_field('PATCH')}}
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name"  value="{{$user->name}} ">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="text" class="form-control" name="email"  value="{{$user->email}} ">
			  </div>	
			  <div class="form-group">
			    <label for="exampleInputEmail1">Password</label>
			    <input type="text" class="form-control" name="password"  value="">
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
			    <label for="exampleInputEmail1">Address</label>
			    <input type="text" class="form-control" name="address"  value="{{$user->address}}">
			  </div>	
			</div>
		<div class="col-md-5">
			<div class="form-group">
			    <label for="exampleInputEmail1">Company</label>
			    <input type="text" class="form-control" name="company"  value="{{$user->company}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Contact</label>
			    <input type="text" class="form-control" name="contact"  value="{{$user->contact}} ">
			  </div>	
			   <div class="form-group">
			    <label for="exampleInputEmail1">CNIC</label>
			    <input type="text" class="form-control" name="cnic"  value="{{$user->cnic}} ">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Status</label>
			  <select class="form-control" name="status">
			  	<option value="0" {{$user->status=='0' ? 'selected' : ''}}> Active</option>
			  	<option value="1" {{$user->status=='1' ? 'selected' : ''}} > Blocked</option>
			  </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Role</label>
			  <select class="form-control" name="role">
			  	<option value="2" {{$user->role=='2' ? 'selected' : ''}}>Seller</option>
			  	<option value="3" {{$user->role=='3' ? 'selected' : ''}} > Buyer</option>
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