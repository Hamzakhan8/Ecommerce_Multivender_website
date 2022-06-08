<!doctype html>
<html lang="en">
<title>Contact Us Page</title>

@include('front-end/partials/css-files')

<body>

    <!--================Header Menu Area =================-->
@include('front-end/partials/top-header')

    <br><br>
    @if($message = Session::get('success'))
        <div class="alert alert-success container alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area mb-5" style="margin-top: -350px !important; ">
        <div class="container">
            <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                data-mlat="40.701083" data-mlon="-74.1522848">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Peshawar Pakistan</h6>
                            <p>University Road</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>
                                <a >0301 1234567</a>
                            </h6>
                            <p>24 / 7</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>
                                <a>ecommerce@gmail.com</a>
                            </h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="{{route('contact.store')}}" method="post" onsubmit="return validation()">
                      @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                            <input type="text"  class="form-control text-dark" id="name" name="name" placeholder="Enter your name">
                            <span id="nameerror" class="text-danger font-weight-bold"></span>
                            </div>


                            <div class="form-group">
                            <input type="email"  class="form-control text-dark" id="email" name="email" placeholder="Enter email address">
                            <span id="emailerror" class="text-danger font-weight-bold"></span>
                            </div>

                            <div class="form-group">
                            <input type="text" class="form-control text-dark" id="subject" name="subject" placeholder="Enter Subject" >
                            <span id="subjecterror" class="text-danger font-weight-bold"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <textarea class="form-control text-dark" name="message" id="message" rows="1" placeholder="Enter Message" ></textarea>
                            <span id="messageerror" class="text-danger font-weight-bold"></span>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>

<script>

  function validation(){
   var name = document.getElementById('name').value;
   var email = document.getElementById('email').value;
   var subject = document.getElementById('subject').value;
   var message = document.getElementById('message').value;
  

   var namecheck = /^[a-zA-Z ]{3,30}$/;
   var emailcheck = /^([a-zA-Z\d\.-]+)@([a-zA-Z\d-]+)\.([a-zA-Z]{2,8})(\.[a-zA-Z]{2,8})?$/;
   var subjectcheck = /^[a-zA-Z ]{3,30}$/;
   var messagecheck = /^[a-zA-Z ]{3,300}$/;

   if (namecheck.test(name)) {
        document.getElementById('nameerror').innerHTML = " ";
   }else{
     document.getElementById('nameerror').innerHTML = " Please provide Correct Name ";
     return false;
   }

   if (emailcheck.test(email)) {
        document.getElementById('emailerror').innerHTML = " ";
   }else{
     document.getElementById('emailerror').innerHTML = " Please provide a valid email ";
     return false;
   }

    if (subjectcheck.test(subject)) {
        document.getElementById('subjecterror').innerHTML = " ";
   }else{
     document.getElementById('subjecterror').innerHTML = " Please Enter Subject Name ";
     return false;
   }


    if (messagecheck.test(message)) {
        document.getElementById('messageerror').innerHTML = " ";
   }else{
     document.getElementById('messageerror').innerHTML = " Please Enter Your Message ";
     return false;
   }


   }
</script>

@include('front-end.partials.footer')

@include('front-end.partials.js-file')

