@extends('admin-dashboard/layouts/master')
<title>All Users </title>
@section('main-contents')

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   	<strong>{{$message}}</strong>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
</div>
@endif	
		<div class="container-fluid">
			<div class="row mb-2 ml-1 text-light font-weight-bold">
				<a class="btn btn-primary" href="{{route('user.create')}}" style="border-radius: 5px;" role="button">ADD NEW USERS</a>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table  table-striped table-hover" id="myTable">
									<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<!-- <th>Email Verfication</th> -->
										<th>Country</th>
										<th>City</th>
										<th>Company</th>
										<th>Address</th>
										<th>Contact</th>
										<th>CNIC</th>
										<th>Role</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
										@foreach($users as $user)
										<tr>
											<td>{{$user->id}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<!-- <td>{{$user->email_verified_at=='' ? 'not verified' : 'verified'}}</td> -->
											<td>{{$user->country}}</td>
											<td>{{$user->city}}</td>
											<td>{{$user->company}}</td>
											<td>{{$user->address}}</td>
											<td>{{$user->contact}}</td>
											<td>{{$user->cnic}}</td>
											<td>
												@if($user->role==2)
												Seller
												@elseif($user->role==3)
												Buyer
												@endif
											</td>
											<td>
												@if($user->status==0)
												active
												@else
												blocked
												@endif
											</td>
											<td>
										<a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">EDIT</a>
										<a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger">DELETE</a>
										<a href="{{route('profile.show',$user->id)}}" class="btn btn-info">SHOW</a>
											</td>
										</tr>	
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



@endsection