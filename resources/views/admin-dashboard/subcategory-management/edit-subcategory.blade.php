@extends('admin-dashboard.layouts.master')
<title>Edit Subcategory</title>

@section('main-contents')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form action=" {{route('subcategory.update', $subcategory->id)}} " method="post">
				{{method_field('patch')}}
				@csrf
			  <div class="form-group">
			  	<label>Category</label>
			  	<select class="form-control" name="category">
			  		@foreach($categories as $category)
			  		<option value="{{$category->id}}" @if($category->id == $subcategory->category->id ) selected @endif>{{$category->name}} </option>
			  		@endforeach
			  	</select>
			  </div>		

			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name"  value="{{$subcategory->name}}">
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>			
		</div>	
	</div>
</div>

@endsection