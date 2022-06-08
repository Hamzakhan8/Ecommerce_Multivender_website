<title>SubCategory Registration</title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form action=" {{route('subcategory.store')}} " method="post">
				@csrf
			  <div class="form-group">
			  	<select class="form-control" name="category">
			  		@foreach($categories as $category)
			  		<option value="{{$category->id}}">{{$category->name}} </option>
			  		@endforeach
			  	</select>
			  </div>		

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