
@extends('layouts.app')
@section('content')

<div class="col-md-6">
<form action="{{url('article/store')}}" method="post">
	@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">NAME</label>
    <input type="text" name="title" class="form-control">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Description</label>
    <input type="text" name="description" class="form-control">
  </div>
  <div class="form-group">
    <!-- tags[] mean hum is me array pass kar rahe matlab multple options pass kar rahe hain -->
    <select name="tags[]" class="custom-select" multiple>
  @foreach($tags as $tag)
  <option value="{{$tag->id}}">{{$tag->name}}</option>
  @endforeach
    </select>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<p>if u want to check error just press submit without entry or just one word in the first field</p>
<br>
@if($errors->any())
<!-- its the variable error which is global error bag that stores the error coming from the request we have created and from any data of form that has passed thrpugh validations any is used id the erroe ha any error then run the following code -->

	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
		<!-- this all is used to show all the multiple errors one by one coz $error can have multiplr errors -->
		<li>{{$error}}</li>
		@endforeach
	</ul>
@endif

@endsection