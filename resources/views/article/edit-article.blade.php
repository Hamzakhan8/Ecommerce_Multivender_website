
@extends('layouts.app')
@section('content')


<form method="post" action="{{url('article/update', $article->id)}}">

	@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">NAME</label>
    <input type="text" name="title" class="form-control" value="{{$article->title}}">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Description</label>
    <input type="text" name="description" class="form-control" value="{{$article->description}}">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
@endsection