<title>Create Coupons </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')
	
	<div class="container-fluid">
<form method="post" action="{{route('coupon.store')}}" >
			@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Code</label>
		    <input type="text" class="form-control" name="code" >
			  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Price</label>
		    <input type="text" class="form-control" name="price" >
		  </div>			 
		  <div class="form-group">
		    <label for="exampleInputEmail1">From Date</label>
		    <input type="date" class="form-control" name="from_date" >
		  </div>			 
		  <div class="form-group">
		    <label for="exampleInputEmail1">To Date</label>
		    <input type="date" class="form-control" name="to_date" >
		  </div>			 

	      <div class="form-group">
			<button type="submit" class="btn rounded btn-primary">Submit</button>	
		   </div>
		</form>	
</div>

@endsection