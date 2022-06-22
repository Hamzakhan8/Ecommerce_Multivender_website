@include('admin-dashboard/partials/css-file')
  <body>
    <!-- Side Navbar -->
    @include('admin-dashboard/partials/aside-nav')
    <div class="page">
      <!-- navbar-->
      @include('admin-dashboard/partials/top-header-nav')
      <!-- Counts Section -->
        @include('admin-dashboard/partials/analytics')



<!-- THIS IS FOR THE MAIN CONTENTS,  TO BEDISPLAYED IN EVERY PAGE  -->

      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">

           @yield('main-contents')

          </div>
        </div>
      </section>

<!-- THIS IS END FOR THE MAIN CONTENTS,  TO BEDISPLAYED IN EVERY PAGE  -->





     @include('admin-dashboard/partials/footer')
    </div>
    @include('admin-dashboard/partials/jsfile')
  </body>
</html>
