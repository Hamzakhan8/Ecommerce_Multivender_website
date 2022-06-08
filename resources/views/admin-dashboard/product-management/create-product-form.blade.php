<title>Product Registeration </title>
@extends('admin-dashboard/layouts/master')
@section('main-contents')

<div class="container-fluid">
	@if($errors->any())
	<div class="alert alert-danger" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span></button>
	@foreach($errors->all() as $error)
  	<strong>Warning !</strong> {{$error}}<br>
	@endforeach
	</div>
	@endif
		<div class="col-md-7">
			<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="title"  placeholder="Enter Product Title">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Description</label>
			    <input type="text" class="form-control" name="description"  placeholder="Enter Description Name">
			  </div>			 
			  <!--  <div class="form-group">
			   	<label for="exampleInputEmail1">Select Brand</label>
			    <select name="brand" class="form-control">
			    	@foreach($brands as $brand)
			    	<option value="{{$brand->id}}">{{$brand->name}}</option>
			    	@endforeach
			    </select>
				</div> -->

			    <div class="form-group">
			    <label for="exampleInputEmail1">Select Category</label>
			    <select name="category" class="abc form-control" >
			    	<option> Select Category</option>
			    	@foreach($categories as $category)
			    	<option value="{{$category->id}}" >{{$category->name}}</option>
			    	@endforeach
			    </select>
				</div>

			    <div class="form-group">
			   	<label for="exampleInputEmail1">Select Sub Category</label>
			    <select class="form-control" id="subcategory" name="subcategory">
			    	
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Price</label>
			    <input type="text" class="form-control" name="price"  placeholder="Enter Price ">
			  </div>
			 
			  <!-- <div class="form-group">
			    <label style="font-size: 20px;">Product Size</label>
			   <div class="col-sm-10">
			   	<label class="checkbox-inLine" style="font-size: 20px;"> 
			   		<input style="height: 20px; width: 20px;" type="checkbox" name="size[]" value="small"> Small
			   	</label>
			   	<label class="checkbox-inLine" style="font-size: 20px;"> 
			   		<input style="height: 20px; width: 20px;" type="checkbox" name="size[]" value="medium"> Medium
			   	</label>
			   	<label class="checkbox-inLine" style="font-size: 20px;"> 
			   		<input style="height: 20px; width: 20px;" type="checkbox" name="size[]" value="large"> Large
			   	</label>
			   </div>
			  </div> -->


			  <div class="form-group">
			    <input type="file" class="form-control-warning" name="image" > <small class="form-text">Image Of Product</small>
			  </div>
			  <div class="form-group">
			  <button type="submit" class="btn btn-primary">Submit</button>	
			  </div>
			</form>		
			

		</div>	
	</div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $(".abc").change(function(e){
    var like = $(this).val();
    
    $.ajax({
            type: 'GET',
            url:'{{url("categoryAjax/")}}'+'/'+like ,
            // data: {like: '2'},
            dataType: 'json',
            success: function(data){
               //alert(data[0].name);

                var res='';
            $.each (data, function (key, value) {
            res +=
            '<option value='+value.id+'>'+value.name+'</option>';
            
           });

            $('#subcategory').html(res);
        
        }
    
        });
    });
});
</script>