<!doctype html>
<html lang="en">
<title>All Halls List</title>
<style> .f_p_img img{height: 200px; } </style>
@include('front-end/partials/css-files')

<body>

  <!--================Header Menu Area =================-->
@include('front-end/partials/top-header')
  <!--================Header Menu Area =================-->

<br><br>
  <section class="feature_product_area section_gap">
    <div class="main_box">
      <div class="container-fluid">
        <div class="row">
          <div class="main_title pt-2 mt-2">
            <h2>Halls Information</h2>
          </div>
        </div>
        <div class="row">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hall as $hall)
    <tr>
      <th scope="row">{{$hall->id}}</th>
      <td>{{$hall->name}}</td>
      <td>{{$hall->address}}</td>
      <td>{{$hall->contact}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>

      </div>
    </div>
  </section>
      
<!-- data div ends here -->


@include('front-end.partials.footer')

@include('front-end.partials.js-file')





<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>