<title>Single Article</title>
@extends('layouts.app')
@section('content')

<h1 class="text-center">{{$article->title}}</h1>

<h3>{{$article->title}}</h3>
<p>
	{{$article->description}}
</p>

<p><strong>TAGS</strong></p>
<ul>
	@foreach($article->tags as $tag)
	<li><a href="{{route('tag.search',$tag->id)}}">{{$tag->name}}</a></li>
	@endforeach
</ul>
<a class="btn btn-info" href="{{url('article/edit', $article->id)}}">EDIT</a>

<a class="btn btn-danger" onclick="return confirm('do u want to delete')" href="{{url('article/delete', $article->id)}}">DELETE</a>
@endsection