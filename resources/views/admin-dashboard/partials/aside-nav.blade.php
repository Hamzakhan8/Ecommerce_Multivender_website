<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{asset('storage/'.Auth()->user()->image_path)}}" alt="Profile Pic" class="img-fluid ">
            <h2 class="h5">{{ Auth::user()->name }} </h2><span class="text-light">
            @if(Auth::user()->role==2)
            {{'Seller'}}
            @elseif(Auth::user()->role==3)
            {{'Buyer'}}
            @else
            {{'Admin'}}
            @endif </span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="{{url('admin-dash')}}" style="color: red; text-decoration: none;" class="brand-small text-center"> {{ Auth::user()->name }} </a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main Menu</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li><a href="{{route('home.page')}}"> <i class="icon-home"></i>Home</a></li>
            <li><a href="{{route('profile.show', auth()->user()->id)}}"> <i class="icon-form"></i>Profile Setting</a></li>
            @if(auth()->user()->role=='1')
            <li><a href="{{route('user.index')}}"> <i class="icon-user"></i>Users </a></li>
            <!-- <li><a href="{{route('user.admins')}}"> <i class="icon-user"></i>Admin </a></li> -->
            <li><a href="{{route('coupon.index')}}"> <i class="icon-user"></i>Coupons </a></li>
            <li><a href="{{route('contact.index')}}"> <i class="icon-user"></i>Contact Us </a></li>
            <li><a href="{{route('hall.index')}}"> <i class="icon-user"></i>Event Halls </a></li>

             <!-- <li><a href="{{route('brand.index')}}"> <i class="fa fa-amazon"></i>Brand </a></li> -->
            <li><a href="{{route('city.index')}}"> <i class="icon-grid"></i>City </a></li>
            <li><a href="{{route('category.index')}}"> <i class="icon-grid"></i>Category </a></li>
          <li><a href="{{route('subcategory.index')}}"> <i class="icon-grid"></i>Sub Category </a></li>
           
            @endif

          @if(auth()->user()->role != 3)
          <li>
            <a href="{{route('product.index')}}"> <i class="fa fa-archive"></i>Products</a>
          </li>
          @endif
          <li>
            <a href="{{route('order.index')}}"> <i class="icon-user"></i>Orders </a>
          </li>
          
            
            <!-- the drop down item  -->
            <!-- 
            <li>
              <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                  <i class="icon-interface-windows"></i>
                      Example dropdown </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <li><a href="#">Page</a></li>
                      <li><a href="#">Page</a></li>
                      <li><a href="#">Page</a></li>
                    </ul>
            </li> -->


          </ul>
        </div>
        </div>
    </nav>