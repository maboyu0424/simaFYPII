@extends('frontlayout')
@section('contentf')

<main>



<!-- ***** Main Banner Area Start ***** -->
<div class="about-main-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <div class="blur-bg"></div>
            <h4>EXPLORE OUR COMPANY</h4>
            <div class="line-dec"></div>
            <h2>Welcome To Light-Trip</h2>
            <p>We are dedicated to delivering unparalleled travel services.</p>
            <div class="main-button">
              <!-- <a href="reservation.html">Discover More</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="cities-town">
    <div class="container">
      <div class="row">
         
      </div>
    </div>
  </div>
 

  <div class="more-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="assets/images/about-left-image.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Discover More About Our Campsites</h2>
            <p>Welcome to lighttrip.com the site for all things Camping in Malaysia. </p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="info-item">
                <h4>150.640 +</h4>
                <span>Total Guests Yearly</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-item">
                <h4>175.000+</h4>
                <span>Amazing Accomoditations</span>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="info-item">
                <div class="row">
                  <div class="col-lg-6">
                    <h4>12.560+</h4>
                    <span>Amazing Places</span>
                  </div>
                  <div class="col-lg-6">
                    <h4>240.580+</h4>
                    <span>Different Check-ins Yearly</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
           </div>
      </div>
    </div>
  </div>
                            
  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-12">
          <form id="reservation-form" method="post" action="{{url('about/email')}}">
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <h4>Write Your <em>Suggestions</em> Through This <em>Email Form</em></h4>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="Name" class="form-label">Your Name<span class="text-danger">*<span></label>
                      <input type="text" name="full_name" class="form-control" placeholder="Ex. John Smithee" autocomplete="on" required>
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="number" class="form-label">Your Phone Number<span class="text-danger">*<span></label>
                    <input type="text" name="number" class="form-control" placeholder="Ex. +xxx xxx xxx" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                    <label for="Email" class="form-label">Your Account (Email)<span class="text-danger">*<span></label>
                    <input type="email" name="email" class="form-control" placeholder="simaboyu@gmail.com" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                    <label for="Email" class="form-label">Subject<span class="text-danger">*<span></label>
                    <input type="text" name="subject" class="form-control" placeholder="What's your subject?" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-10">
                  <fieldset>
                      <label for="chooseGuests" class="form-label">Your Suggestion<span class="text-danger">*<span></label>
                      <textarea type="text" name="msg" style="height: 240px;width:1050px;border-radius: 20px;background-color:#F9F9F9;" autocomplete="on"  placeholder="  We sincerely hope to obtain your advice" required></textarea>
                      <!-- <input type="text" style="height: 240px;width:1040px;" name="suggestion" class="suggestion" placeholder="We sincerely hope to obtain your advice" autocomplete="on" required> -->
                      
                    </fieldset>
              </div>
               
              <div class="col-lg-12">                        
                  <fieldset>
                      <button type="submit" class="main-button">Send Email</button>
                  </fieldset>
              </div>
              @if(Session::has('success'))
              <p class="text-success">{{Session('success')}}</p>
              @endif

              @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-danger">{{$error}}</p>
                            @endforeach
                            @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Are You Looking To Travel ?</h2>
          <h4>Make A Reservation By Clicking The Button</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="{{url('booking_user')}}">Book Yours Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>


</main>
    <!-- Bootstrap core JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://127.0.0.1:8000/js/sb-admin-2.min.js"></script>

        <!-- Custom styles for this page -->
    <!-- <link href="http://127.0.0.1:8000/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    
    <!-- Page level plugins -->
    <!-- <script src="http://127.0.0.1:8000/vendor/datatables/jquery.dataTables.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="http://127.0.0.1:8000/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="http://127.0.0.1:8000/js/demo/datatables-demo.js"></script> -->
   
   <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

@endsection


