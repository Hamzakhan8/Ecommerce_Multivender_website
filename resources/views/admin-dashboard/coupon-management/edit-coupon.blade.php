<title>Edit Coupons </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')


<div class="container-fluid">
@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   	<strong>{{$message}}</strong>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
</div>
@endif


		<form method="post" action="{{route('coupon.update',$coupon->id)}}" >
			{{method_field('PATCH')}}
			@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Code</label>
		    <input type="text" class="form-control" name="code"  value="{{$coupon->code}}">
			  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Price</label>
		    <input type="text" class="form-control" name="price"  value="{{$coupon->price}}">
		  </div>			 
		  <div class="form-group">
		    <label for="exampleInputEmail1">From Date</label>
		    <input type="date" class="form-control" name="from_date"  value="{{$coupon->from_date}}">
		  </div>			 
		  <div class="form-group">
		    <label for="exampleInputEmail1">To Date</label>
		    <input type="date" class="form-control" name="to_date"  value="{{$coupon->to_date}}">
		  </div>			 

	      <div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>	
		   </div>
		</form>	
@endsection