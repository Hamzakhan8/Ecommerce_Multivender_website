<title>All Coupons </title>
@extends('admin-dashboard/layouts/master')
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


<div class="row mb-2 ml-1 text-light font-weight-bold">
				<a class="btn btn-primary" href="{{route('coupon.create')}}" style="border-radius: 5px;" role="button">ADD NEW COUPONS
				</a>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table  table-striped table-hover" id="myTable">
									<thead>
									<tr>
										<th>Code</th>
										<th>Price</th>
										<th>From Date</th>
										<th>To Date</th>
										<th>Actions</th>
									</tr>
									</thead>
									<tbody>
										@foreach($coupon as $coupon)
										<tr>
											<td>{{$coupon->code}}</td>
											<td>{{$coupon->price}}</td>
											<td>{{$coupon->from_date}}</td>
											<td>{{$coupon->to_date}}</td>
											<td style="display: inline-flex;">
											
											<form method="get" action="{{route('coupon.edit',$coupon->id)}}">
												@csrf
										<button type="submit" class="btn btn-primary rounded" name="submit">Edit</button>
											</form>
											&nbsp&nbsp
											<form method="POST" action="{{route('coupon.destroy',$coupon->id)}}">			{{method_field('delete')}}
												@csrf
									<button type="submit" name="submit" class="btn rounded btn-danger"> Delete</button>
											</form>

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