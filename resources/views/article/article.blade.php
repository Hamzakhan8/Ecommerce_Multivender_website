
@extends('layouts.app')
@section('content')
@foreach($a as $ab)
<article>
<a href="{{url('article', $ab->id)}}">{{$ab->title}}.<br></a>
</article>
@endforeach <br><br>
<a href="{{url('article1to1')}}"><button class="btn btn-info"> Show One To One RelationShip Of the Currently Logged In User</button></a>
@endsection