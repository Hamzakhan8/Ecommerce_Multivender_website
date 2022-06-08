<title>All Orders </title>
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
			<!-- <div class="row mb-2 ml-1 text-light font-weight-bold">
				<a class="btn btn-primary" href="{{route('order.create')}}" style="border-radius: 5px;" role="button">ADD NEW ORDER
				</a>
			</div> -->
			<h1 class="text-center">Orders Table</h1>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table  table-striped table-hover" id="myTable">
									<thead>
									<tr>
										<th>Product Name</th>
										<th>Buyer Name</th>
										@if(auth()->user()->role == 1 or auth()->user()->role==3)
										<th>Seller Company</th>
										@endif
										@if(auth()->user()->role == 1 or auth()->user()->role== 3)
										<th>Seller Phone</th>
										@endif

										@if(auth()->user()->role == 1 or auth()->user()->role== 2)
										<th>Buyer Phone</th>
										@endif
										<th>Extras</th>
										<th>Quantity</th>
										<th>Shipping Charges</th>
										<th>Payment</th>
										<th>Address</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										@foreach($order as $order)
										<tr>

											<!-- admin table -->
											@if(auth()->user()->role == 1)
											<td>{{$order->product->title}}</td>
											<td>
											<a href="{{route('profile.show', $order->buyer->id)}}">
											{{$order->buyer->name}}
											</a>
											</td>
											<td>
											<a href="{{route('profile.show', $order->seller->id)}}">
											{{$order->seller->company ?? $order->seller->name}}
											</a>
											</td>
											<td>
											{{$order->seller->contact}}
											</td>
											<td>{{$order->buyer->contact}}</td>
											<td>{{$order->extras}}</td>
											<td>{{$order->quantity}}</td>
											<td>{{$order->delivery_charges}}</td>
											<td>{{$order->total_price}}</td>
											<td>{{$order->shipping_address}}</td>
											<td>
												@if($order->status=='0')
												Not Shipped
											<a href="{{route('order.edit',$order->id)}}">
											<button class="btn btn-info rounded">Shipped</button>
											</a>
												@else($order->status=='1')
												Shipped
												@endif
											</td>
										<td>
												<form method="POST" action="{{route('order.destroy',$order->id)}}">			{{method_field('delete')}}
												@csrf
									<button type="submit" name="submit" class="btn rounded btn-danger"> Cancel</button>
											</form>	
											</td>
											@endif

											<!-- seller table -->
											@if(auth()->user()->role==2)
											<td>{{$order->product->title}}</td>
											<td>{{$order->buyer->name}}</td>
											<td>{{$order->buyer->contact}}</td>
											<td>{{$order->extras}}</td>
											<td>{{$order->quantity}}</td>
											<td>{{$order->delivery_charges}}</td>
											<td>{{$order->total_price}}</td>
											<td>{{$order->shipping_address}}</td>
											<td>
												@if($order->status=='0')
												Not Shipped
											<a href="{{route('order.edit',$order->id)}}">
											<button class="btn btn-info rounded">Shipped</button>
											</a>
												@else($order->status=='1')
												Shipped
												@endif
											</td>
											<td>@if($order->status=='0')		
										<form method="POST" action="{{route('order.destroy',$order->id)}}">		{{method_field('delete')}}
											@csrf
						<button type="submit" name="submit" class="btn rounded btn-danger"> Cancel</button>
											</form>
											@else
										<button class="btn rounded btn-info" disabled="">Shipped</button>
											</td>
											@endif
										
											@endif

											<!-- buyer table -->
											@if(auth()->user()->role==3)
											<td>{{$order->product->title}}</td>
											<td>{{$order->buyer->name}}</td>
											<td>{{$order->seller->company}}</td>
											
											<td>{{$order->seller->contact}}</td>
											<td>{{$order->extras}}</td>
											<td>{{$order->quantity}}</td>
											<td>{{$order->delivery_charges}}</td>
											<td>{{$order->total_price}}</td>
											<td>{{$order->shipping_address}}</td>
											<td>
												@if($order->status=='0')
												Not Shipped
												@else($order->status=='1')
												Shipped
												@endif
											</td>
											<td>
													
										@if($order->status=='0')		
										<form method="POST" action="{{route('order.destroy',$order->id)}}">		{{method_field('delete')}}
											@csrf
						<button type="submit" name="submit" class="btn rounded btn-danger"> Cancel</button>
											</form>
											@else
											<button class="btn rounded btn-info" disabled="">Received</button>
											</td>
											@endif
										

											@endif
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