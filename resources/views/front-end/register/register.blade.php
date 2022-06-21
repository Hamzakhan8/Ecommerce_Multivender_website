
<html lang="en">
<title>REGISTER</title>

@include('front-end/partials/css-files')

<body>

	<!--================Header Menu Area =================-->
	@include('front-end/partials/top-header')
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Register</h2>
					<!-- <div class="page_link">
						<a href="index.html">Home</a>
						<a href="registration.html">Register</a>
					</div> -->
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('assets/img/login.jpg')}}" alt="">
						<div class="hover">
							<h4>Already Have An Account</h4>
							<p>Click Below To Log In</p>
							<a class="main_btn" href="{{ route('home.login.page') }}">LOG IN </a>
						</div>
					</div>
				</div>
				<div class="col-lg-6"><br>
						@if($errors->any())
						<ul class="alert alert-danger">
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
						@endif
					<div class="login_form_inner reg_form">
						<h3>Create an Account</h3>
						<form class="row login_form" action="{{route('register')}}" method="post" id="contactForm" novalidate="novalidate" onsubmit="return checkforblank()">

							@csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Full Name i.e Ali Khan" autofocus="">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Working Email Address">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter At Least 8 Character Password">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter The Same Password Again">
								<!-- jab b form banana hain to in cheezo ka khyal lazman rako
								1 oper action me link check karo
								2 har input ki id dalna zarrori hain
								3 har input ka name hona zarori hain
								4 password field ka confirm password field banana zarori hain kher hain agar id ya name change ho
								 -->
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="country" name="country" placeholder="Country Name i.e Pakistan">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="city" name="city" placeholder="City Name i.e Peshawar">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="company" name="company" placeholder="If You Are Seller Please Enter Company Name">
							</div>
`							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="address" name="address" placeholder="House# Street# or Shop# Market & City Name">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="contact" name="contact" placeholder="Phone Number Must Be Like 03013216549">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="cnic" name="cnic" placeholder="Enter CNIC Number Without Dashes">
							</div>
							<div class="col-md-12 form-group">
								<label class="form-control">Select Your Role, From Down</label>
								 <select name="role" class="form-control" id="role">
							    	<option value="0">Chose Your Type</option>
							    	<option value="2" >Seller</option>
							    	<option value="3" >Buyer</option>
			    				</select>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit"value="submit" class="btn submit_btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!--================ start footer Area  =================-->




			@include('front-end/partials/footer')


			@include('front-end/partials/js-file')

