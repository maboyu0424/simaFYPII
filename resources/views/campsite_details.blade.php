@extends('frontlayout')
@section('contentf')
<base href="/public">

<main>
<br>
<br>
  <!-- Modal -->
  <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="page-heading page-heading-img-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Discover Campsites that interest you</h4>
          <h2>Details &amp; Comments</h2>
          <!-- <div class="border-button"><a href="about.html">Discover More</a></div> -->
        </div>
      </div>
    </div>
  </div>
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">

            <!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

            <div class="col-lg-5 mt-5">
  <div class="card mb-3">
    @php
      $lastImage = $roomImages->last();
    @endphp   
    
    <img class="card-img img-fluid" src="{{ asset(str_replace('public', 'storage_new', $lastImage->img_src)) }}" alt="Card image cap" id="product-detail">
     
</div>
  <div class="row">
    <!--Start Controls-->
    <div class="col-1 align-self-center">
      <a href="#multi-item-example" role="button" data-bs-slide="prev">
        <i class="text-dark fas fa-chevron-left"></i>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <!--End Controls-->
 
    <!--Start Carousel Wrapper-->
    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
      <!--Start Slides-->
      <div class="carousel-inner product-links-wap" role="listbox">
        @foreach($roomImages->slice(0, 12) as $key => $image)
          @if($key % 3 === 0)
            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
              <div class="row">
          @endif
                <div class="col-4">
                  <a href="#">

                    <img class="card-img img-fluid" src="{{ asset(str_replace('public', 'storage_new', $image->img_src)) }}" alt="Product Image {{ $key + 1 }}" width="350" height="250">

                  </a>
                </div>
          @if(($key + 1) % 3 === 0 || $loop->last)
              </div>
            </div>
          @endif
        @endforeach
      </div>
      <!--End Slides-->
    </div>
    <!--End Carousel Wrapper-->
    <!--Start Controls-->
    <div class="col-1 align-self-center">
      <a href="#multi-item-example" role="button" data-bs-slide="next">
        <i class="text-dark fas fa-chevron-right"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!--End Controls-->
  </div>

<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

    
 

<div id="comment-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($comments as $index => $comment)
      <li data-target="#comment-carousel" data-slide-to="{{$index}}" class="{{$index == 0 ? 'active' : ''}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach ($comments as $index => $comment)
      <div class="carousel-item {{$index == 0 ? 'active' : ''}}">
        <div class="comment mt-4 text-justify float-left col-12">
          <br>
          <div class="col-2">
            <img style="border-radius: 100px;" src="{{ asset(str_replace('public', 'storage_new', $comment->customer->photo)) }}" alt="Profolio_Image" height="63px">
          </div>
          <h5 style="color:aqua;"> {{$comment->customer->full_name}} </h5>

          <br>
          <span>{{$comment->created_at}}</span>

          <br>
          <p>{{$comment->content}}</p>
          <br>
        </div>
      </div>
    @endforeach
  </div>
</div>

            
  


<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

</div>
            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->

            
            <!-- ---------------------------------------------------------------------------------------------------------------------------------------- -->

                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                        
                        <iframe src="{{$details->location}}" width="500px" height="250px" style="padding-left:150px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        
                        <hr style="
                        border: none;
                        border-top: 2px solid #ccc;
                        margin: 20px 0;">
                        

                        <h1 class="h2" style="color:rgba(16, 46, 46, 0.973)">{{$details->title}}</h1>
                            <p class="h3 py-2">${{$details->price}}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>

                           
                            <ul class="list-inline">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                                <li class="list-inline-item">
                                    <h6>| Description:</h6>
                                </li>
                                <br>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$details->description}}</strong></p>
                                </li>
                            </ul>
<br>
                            <ul class="list-inline">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                                <li class="list-inline-item">
                                    <h6>| Contact number:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$details->phone}}</strong></p>
                                </li>
                            </ul>
                         
<br>                        
                            <ul class="list-inline">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                <li class="list-inline-item">
                                    <h6>| Address :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$details->address}}</strong></p>
                                </li>
                            </ul>
                            <br> 

                            <ul class="list-inline">
                            <strong>F</strong>
                                <li class="list-inline-item">
                                    <h6>| Facebook :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{$details->facebook}}"><p class="text-muted">{{$details->facebook}}</p></a>
                                </li>
                            </ul>
                            
                            <br>
                            
                            <h6><i class="fa fa-th" aria-hidden="true"></i> | Amenities:</h6>
                            <ul class="list-unstyled pb-1">
                                <br>
                                <ul class="list-unstyled">
                            @foreach(['atv', 'cycling', 'firepit', 'kayak', 'pet_friendly', 'rafting', 'swimming_pool', 'archery', 'drinking_water', 'fishing', 'kitchen_sink', 'phone_coverage', 'river', 'toilet', 'BBQ_pit', 'event_space', 'lake', 'playground', 'shower', 'waterfall', 'beach', 'farm', 'hiking', 'parking', 'plug', 'surau', 'wifi'] as $amenity)
                            <li>
                            @if(isset($details->roomamenities->$amenity) && $details->roomamenities->$amenity == 1)
                            <p class="h6 py-2"><i class="fa fa-check"></i> {{ ucwords(str_replace('_', ' ', $amenity)) }}</p>
                             @else
                            <p class="h6 py-2"><i class="fa fa-times"></i> {{ ucwords(str_replace('_', ' ', $amenity)) }}</p>
                             @endif
                             </li>
                            @endforeach
                            </ul>


                            </ul>

                        <!-- ---------------------------------------------------------------------------------- -->

                            

                        </div>
                        <div class="main-button" style="margin-left:35%">
                    <a href="{{'/campsites_spe/specific_booking/'.$details->id}}">Make a Reservation</a>
                  </div>
                    </div>
                    
                </div>
            </div>
           
                
       
        </div>


    </section>
    <!-- Close Content -->
    


<style>



  .navbar-nav{
    width: 100%;
}

@media(min-width:568px){
    .end{
        margin-left: auto;
    }
}

@media(max-width:768px){
    #post{
        width: 100%;
    }
}
#clicked{
    padding-top: 1px;
    padding-bottom: 1px;
    text-align: center;
    width: 100%;
    background-color: #ecb21f;
    border-color: #a88734 #9c7e31 #846a29;
    color: black;
    border-width: 1px;
    border-style: solid;
    border-radius: 13px; 
}

#profile{
    background-color: unset;
    
} 

#post{
    margin: 10px;
    padding: 6px;
    padding-top: 2px;
    padding-bottom: 2px;
    text-align: center;
    background-color: #ecb21f;
    border-color: #a88734 #9c7e31 #846a29;
    color: black;
    border-width: 1px;
    border-style: solid;
    border-radius: 13px;
    width: 50%;
}

/* body{
    background-color: black;
} */

#nav-items li a,#profile{
    text-decoration: none;
    color: rgb(224, 219, 219);
    background-color: black;
}


.comments{
    margin-top: 5%;
    margin-left: 20px;
}

.darker{
    border: 1px solid #ecb21f;
    background-color: rgba(16, 46, 46, 0.973);
    float: right;
    border-radius: 5px;
    padding-left: 40px;
    padding-right: 30px;
    padding-top: 10px;
}

.comment{
    border: 1px solid rgba(16, 46, 46, 1);
    background-color: rgba(16, 46, 46, 0.973);
    float: left;
    border-radius: 5px;
    padding-left: 40px;
    padding-right: 30px;
    padding-top: 10px;
    
}
.comment h4,.comment span,.darker h4,.darker span{
    display: inline;
}

.comment p,.comment span,.darker p,.darker span{
    color: rgb(184, 183, 183);
}

h1,h4{
    color: white;
    font-weight: bold;
}
label{
    color: rgb(212, 208, 208);
}

#align-form{
    margin-top: 20px;
}
.form-group p a{
    color: white;
}

/* #checkbx{
    background-color: black;
} */

#darker img{
    margin-right: 15px;
    position: static;
}

.form-group input,.form-group textarea{
    background-color: black;
    border: 1px solid rgba(16, 46, 46, 1);
    border-radius: 12px;
}

form{
    border: 1px solid rgba(16, 46, 46, 1);
    background-color: rgba(16, 46, 46, 0.973);
    border-radius: 5px;
    padding: 20px;
 }
</style>


</main>
    <!-- Start Script -->
    <script src="assets2/js/jquery-1.11.0.min.js"></script>
    <script src="assets2/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets2/js/bootstrap.bundle.min.js"></script>
    <script src="assets2/js/templatemo.js"></script>
    <script src="assets2/js/custom.js"></script>
    <!-- End Script -->

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


    
    <!-- Start Slider Script -->
    <script src="assets2/js/slick.min.js"></script>
    


    <script>
  $(document).ready(function() {
    var interval = 3000; // set the interval to 3 seconds
    var commentCarousel = $('#comment-carousel'); // get a reference to the carousel

    setInterval(function() {
      var activeItem = commentCarousel.find('.carousel-item.active');
      var nextItem = activeItem.next('.carousel-item');
      if (!nextItem.length) {
        nextItem = commentCarousel.find('.carousel-item:first');
      }
      activeItem.removeClass('active');
      nextItem.addClass('active');
    }, interval);
  });
</script>



    <!-- End Slider Script -->

@endsection
