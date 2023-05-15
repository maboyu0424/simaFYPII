@extends('frontlayout')
@section('contentf')

<main>
<br>
<br>

<!-- Begin Page Content -->
<body>


  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Discover Our Weekly Offers</h4>
          <h2>Amazing Prices &amp; More</h2>
          <!-- <div class="border-button"><a href="about.html">Discover More</a></div> -->
        </div>
      </div>
    </div>
  </div>

  <!-- ---------------------------------------------------------------------------------------------------------------------------------------- -->

    

    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="weekly-offers">
<div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">

          @foreach($room as $room)
            <div class="item">
              <div class="thumb">
              @if ($room->first_image)
        
        <div class="image">
        <img width="250" height="500" src="{{asset(str_replace('public', 'storage_new', $room->first_image->img_src))}}" />
                      </div>
                      
                @endif

                <div class="text">
               
                  <a href="{{'/campsites_spe/details/'.$room->id}}"><h4>{{substr($room->title, 0, 10) ?? 'N/A'}}...</h4></a>
                  <br>
                  <h6>RM{{$room->price}}<br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  @if($room->facebook!="None")
                  <li><i class="fa-brands fa-facebook"></i><a href="{{$room->facebook}}">Click to Visit FB</a></li>
                  @else
                  <li><i class="fa-brands fa-facebook"></i><a href="#">Wait for updating...</a></li>
                  @endif
                  <ul>
                    
                    <li><i class="fa fa-taxi"></i>{{substr($room->address, 0, 10) ?? 'N/A'}}...</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-phone"></i> {{$room->phone}}</li>
                  </ul>
                  <div class="main-button">
                  <a href="{{'/campsites_spe/specific_booking/'.$room->id}}">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
</div>
<!-- --------------------------------------------------------------------------------------------------------------------------------- -->

<div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>

        @foreach($room2 as $room)
        
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
              @if ($room->first_image)
        
        <div class="image">
        <img width="240" height="370" src="{{asset(str_replace('public', 'storage_new', $room->first_image->img_src))}}" />
                      </div>
                @endif
              
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <!-- <span class="info">*Limited Offer Today</span> -->
                  <a href="{{'/campsites_spe/details/'.$room->id}}"><h4>{{$room->title}}</h4></a>
                  <div class="row">
                    <div class="col-6">
                    <i class="fa fa-money-bill" style="color: #828282;"></i>
                      <span class="list">RM{{$room->price}}</span>
                    </div>
                    <div class="col-6">
                    <i class="fa fa-phone" style="color: #828282;"></i>
                      <span class="list">{{$room->phone}}</span>
                    </div>
                    
                  </div>
                 
                  <p>{{substr($room->description, 0, 80) ?? 'N/A'}}...</p>
                  
                  <div class="main-button">
                  <a href="{{'/campsites_spe/specific_booking/'.$room->id}}">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endforeach
        

        
      </div>
    </div>
  </div>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->



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

<!-- /.container-fluid -->


</body>
</main>
    <!-- Bootstrap core JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://127.0.0.1:8000/js/sb-admin-2.min.js"></script>

@endsection

