<title>Single tag</title>
@extends('layouts.app')
@section('content')

<h1 class="text-center">{{$tag->name}}</h1>

<h3>{{$tag->name}}</h3>
<p>
	This Is The Name Of The Tag.
</p>

<p><strong>Related Aticle To The Tag</strong></p>
<ul>
	@foreach($tag->articles as $article)
	<li><a href="{{route('article.show',$article->id)}}">{{$article->title}}</a></li>
	@endforeach
</ul>

@endsection