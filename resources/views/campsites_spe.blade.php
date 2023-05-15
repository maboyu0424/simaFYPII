@extends('frontlayout')
@section('contentf')

<main>
<br>
<br>

<!-- Begin Page Content -->
<body>


  <div class="page-heading page-heading-img">
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

  <!-- <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Location" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                          <option selected>Destinations</option>
                          <option type="checkbox" name="option1" value="Italy">Italy</option>
                          <option value="France">France</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Australia">Australia</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Singapore">Singapore</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                          <option selected>Price Range</option>
                          <option value="100">$100 - $250</option>
                          <option value="250">$250 - $500</option>
                          <option value="500">$500 - $1,000</option>
                          <option value="1000">$1,000 - $2,500</option>
                          <option value="2500+">$2,500+</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button class="border-button">Search Results</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->

  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Offers In Each Type of Campsite</h2>
            <p>Search and discover camping, glamping, car camping, RV and chalet spots around Malaysia</p>
          </div>
        </div>


        @foreach($rooms as $room)
        
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">

              

                @if ($roomImage = $roomImages->where('room_id', $room->id)->last())
            <img width="240" height="370" src="{{asset(str_replace('public', 'storage_new', $roomImage->img_src))}}" alt="Room image">
                 @endif
                
              
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <!-- <span class="info">*Limited Offer Today</span> -->
                  <a href="{{'/campsites_spe/details/'.$room->id}}"><h4>{{$room->title}}</h4></a>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list">5 Days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p>{{substr($room->description, 0, 90)}}...</p>
                  
                  <div class="main-button">
                    <a href="{{'/campsites_spe/specific_booking/'.$room->id}}">Make a Reservation</a>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endforeach
        <!-- <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                  <img src="assets/images/deals-02.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="info">*Today & Tomorrow Only</span>
                  <h4>Venezia Italy Ipsum</h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list">5 Days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                  <img src="assets/images/deals-03.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="info">**Undefined</span>
                  <h4>Glasgow City Lorem</h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list">5 Days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                  <img src="assets/images/deals-04.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="info">*Offer Until 24th March</span>
                  <h4>Glasgow City Lorem</h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list">5 Days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p>This free CSS template is provided by Template Mo website.</p>
                  <div class="main-button">
                    <a href="reservation.html">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <!-- <div class="col-lg-12">
          <ul class="page-numbers">
            <li><a href="#"><i class="fa fa-arrow-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div> -->
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
            <a href="reservation.html">Book Yours Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- /.container-fluid -->

</main>
    <!-- Bootstrap core JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://127.0.0.1:8000/js/sb-admin-2.min.js"></script>

@endsection

