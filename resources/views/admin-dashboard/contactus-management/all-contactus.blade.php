@extends('admin-dashboard/layouts/master')
<title>ContactUs Msgz </title>
@section('main-contents')


	<div class="container-fluid">
	
		@if($message = Session::get('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		   	<strong>{{$message}}</strong>
		  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
		</div>
		@endif		
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
										<th>Subject</th>
										<th>Message</th>
										<th>Delete</th>
									</tr>
									</thead>
									<tbody>
										@foreach($contact as $contact)
										<tr>
											<td>{{$contact->id}}</td>
											<td>{{$contact->name}}</td>
											<td>{{$contact->email}}</td>
											<td>{{$contact->subject}}</td>
											<td>{{$contact->message}}</td>
											<td>
										<a href="{{route('contact.destroy',$contact->id)}}" class="btn btn-danger">
										DELETE
										</a>								
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