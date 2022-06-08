<header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars text-light" style="font-size: 20px;"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-clear">Dashboard</strong></div></a></div>
                  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                  <button type="submit" class="btn btn-warning rounded"> LogOut</button>
                  </form> 
                  
            </div>
          </div>
        </nav>
      </header>