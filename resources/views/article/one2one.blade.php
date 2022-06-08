@extends('layouts.app')
@section('content')

@foreach($article as $article)

{{$article->title}}
<br>
@endforeach

@endsection