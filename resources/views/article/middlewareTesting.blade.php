@extends('layouts.app')

@section('content')

{{'Dear User U cannot visit The Article Page Because ur user id is not 1 so Please log In as Havind User ID = 1'}}
<br><br>

<form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
 <button type="submit" name="logout" class="btn btn-info" value="submit"> Log Out </button> 
</form>

@endsection