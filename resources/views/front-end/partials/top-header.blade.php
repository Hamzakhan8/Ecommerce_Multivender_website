<style>
.azanlog{display: none;}
.top-data p, .top-data ul li a{ font-weight: bold !important; color: crimson !important;}

@media only screen and (max-width: 600px) {
.azanlog{display: block;}
.azansearch{ width: 50px !important; margin-left:10px; }
.azansrchin{width: 150px !important; }
.main_menu{ border-bottom: 2px solid red !important; }
}

@media only screen and (max-width: 1000px) {
.main_menu{ border-bottom: 2px solid red !important; }
.active a{display: none !important;}

}

@media only screen and (max-width: 1450px) {
.main_menu{ border-bottom: 2px solid red !important; }
#cartli{display: none !important; }
}


</style>
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid top-data">
				<div class="float-left">
					<p>Call Us: 0321-9196978</p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<!-- yaha pe laravel -> layouts -> master page wala code guest se le k end guest tak code copy karo
						is trah karo k guest k bad login wala li likho jo template ka hain phir us k bad else k bad master page se else se le k end guest tak code copy kar k yaha pe paste karo

						aur yaha khud ba khud ek nav ban jayega -->
						@guest
						<li id="logreg">
							<a href="{{ route('home.login.page') }}">
								Login/Register
							</a>
						</li>
						 @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
						<li>
							<a href="{{url('admin-dash')}}">
								My Account
							</a>
						</li>
						<li>
							<a href="{{route('cart.list')}}">Cart
							<i class="lnr lnr lnr-cart" style="font-size: 15px;"></i>
							</a>
						</li>
						<li>
							<a href="{{route('contactUs')}}">
								Contact Us
							</a>
						</li>
						<li></li>

					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{route('home.page')}}">
						{{-- <img src="{{url('assets/img/abc.png')}}" alt=""> --}}
						<span>E Shop</span>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item">
										<a class="nav-link"  href="{{route('home.page')}}">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link"  href="{{route('ViewAllGifts')}}">All products</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <i class="fas fa-chevron-down"></i></a>
										<ul class="dropdown-menu">
								@foreach($categories as $category)
								<li class="nav-item">
	<a class="nav-link" href="{{route('category.products', $category->name)}}">{{$category->name}}</a>
								</li>
								@endforeach
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link"  href="{{route('allocassions')}}">All Categories</a>
									</li>

									<li class="nav-item">
										<a class="nav-link"  href="{{route('allShop')}}">All Shops</a>
									</li>
									{{-- <li class="nav-item">
										<a class="nav-link" href="{{route('hallList')}}">Contact Numbers</a>
									</li> --}}


									<li class="nav-item azanlog">
										<a class="nav-link" href="{{route('contactUs')}}">Contact Us</a>
									</li>

									@guest
									<li class="nav-item azanlog">
										<a href="{{url('login')}}" class="nav-link">
											Login/Register
										</a>
									</li>

						 			@else
                            		<li class="nav-item dropdown azanlog">
                                		<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                		</a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            		</li>
                        			@endguest

									<li class="nav-item azanlog">
									<a class="nav-link" href="{{url('admin-dash')}}">My Account</a>
									</li>

									<li class="nav-item azanlog">
									<a href="{{route('cart.list')}}" class="nav-link">Cart
									<i class="lnr lnr lnr-cart" style="font-size: 20px;"></i>
									</a>
									</li>

								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">



									<hr>
								<nav class="navbar navbar-light bg-light ml-2">
  								<form class="form-inline" action="{{route('search.product')}}" method="get">
  								@csrf
	<input class="form-control azansrchin" type="search" placeholder="Search" name="search">&nbsp
	<button class="btn btn-outline-success form-control fa fa-search azansearch" type="submit">
	</button>
										  </form>
										</nav>
									</form>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
