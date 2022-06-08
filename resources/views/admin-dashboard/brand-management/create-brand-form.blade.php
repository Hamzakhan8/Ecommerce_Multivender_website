<title>Brands Register </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form action=" {{route('brand.store')}} " method="post">
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name"  placeholder="ENTER BRAND NAME">
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>			
		</div>	
	</div>
</div>


@endsection