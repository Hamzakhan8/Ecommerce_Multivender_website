@extends('admin-dashboard.layouts.master')
<title>Edit Product</title>

@section('main-contents')

	<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<form method="post" action="{{route('product.update',$product->id)}}"  enctype="multipart/form-data">
				{{method_field('PATCH')}}
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="title"  value="{{$product->title}}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Description</label>
			    <input type="text" class="form-control" name="description"  value="{{$product->description}}">
			  </div>			 
			

			  	<div class="form-group">
			    <label for="exampleInputEmail1">Select Category</label>
			    <select name="category" class="abc form-control" >
			    	<option> Select Category</option>
			    	@foreach($categories as $category)
			    	<option value="{{$category->id}}"  {{($category->id == $product->category->id) ? 'selected' : ''}}  >{{$category->name}}</option>
			    	@endforeach
			    </select>
				</div>

				<div class="form-group">
			   	<label for="exampleInputEmail1">Select Sub Category</label>
			    <select class="form-control" id="subcategory" name="subcategory">
			    	@foreach($subcategories as $subcategory)
			    	<option value="{{$subcategory->id}}" {{($subcategory->id == $product->subcategory->id) ? 'selected' : '' }}  >{{$subcategory->name}}</option>
			    	@endforeach
			    </select>
			  </div>
			

			  <div class="form-group">
			    <label for="exampleInputEmail1">Price</label>
			    <input type="text" class="form-control" name="price"  value="{{$product->price}}">
			  </div>

			  
			
			   </div>
			  </div>
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