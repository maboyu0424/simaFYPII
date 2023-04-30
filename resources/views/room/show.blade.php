@extends('layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Room
                            <a href="{{url('admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>

                        
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Id</th>
                                        <td>
                                            {{$data->id}}
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Campsite Types</th>
                                        <td>
                                        {{ $data->roomtype->title}}
                                        </td>
                                    </tr>
                                     
                                    <tr>
                                        <th>Title</th>
                                        <td>
                                        {{ $data->title}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>
                                        {{ $data->price}}    
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                        {{$data->description}}
                                        </td>
                                    </tr>

                                    <!-- ................................. -->
                                    <tr>
                                        <th>Phone</th>
                                        <td>
                                        {{$data->phone}}
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                        {{$data->address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Facebook</th>
                                        <td>
                                        {{$data->facebook}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Gallery Images</th>
                                        <td>
                                        <table class="table table-bordered mt-3">
                                                <tr>
                                                    @foreach($data->roomimages as $img)
                                                   <td class="imgcol{{$img->id}}">
                                                    <img width="200" src="{{asset(str_replace('public', 'storage_new', $img->img_src))}}" />
                                                    <!-- <img width="150" src="{{asset('storage/app/'.$img->img_src)}}" /> -->
                                                </td>
                                                    @endforeach
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>


                                    
                                    
                                </table>
                               
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>ATV</th>
                                    <th>Cycling</th>
                                    <th>Firepit</th>
                                    <th>Kayak</th>
                                    <th>Pet Friendly</th>
                                    <th>Rafting</th>
                                    <th>Swimming Pool</th>
                                    <th>Archery</th>
                                    <th>Drinking Water</th>
                                    <th>Fishing</th>
                                    <th>Kitchen/Sink</th>
                                    <th>Phone Coverage</th>
                                    <th>River</th>
                                    <th>Toilet</th>

                                </tr>
                                <tr>
                                    
                                    <td>
                                    @if($data->roomamenities->ATV)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->cycling)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->firepit)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->kayak)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->pet_friendly)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->rafting)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->swimming_pool)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->archery)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->drinking_water)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->fishing)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->kitchen_sink)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    <td>
                                    @if($data->roomamenities->phone_coverage)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    
                                    <td>
                                    @if($data->roomamenities->river)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    
                                    <td>
                                    @if($data->roomamenities->toilet)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                    </td>
                                    

<!--                                     
                                    <td>Cycling</td>
                                    <td>Firepit</td>
                                    <td>Kayak</td>
                                    <td>Pet Friendly</td>
                                    <td>Rafting</td>
                                    <td>Swimming Pool</td>
                                    <td>Archery</td>
                                    <td>Drinking Water</td>
                                    <td>Fishing</td>
                                    <td>Kitchen/Sink</td>
                                    <td>Phone Coverage</td>
                                    <td>River</td>
                                    <td>Toilet</td>
                                     -->

                                </tr>
                                <tr>
                                    <th>BBQ Pit</th>
                                    <th>Event Space</th>
                                    <th>Gazebo</th>
                                    <th>Lake</th>
                                    <th>Playground</th>
                                    <th>Shower</th>
                                    <th>Waterfall</th>
                                    <th>Beach</th>
                                    <th>Farm</th>
                                    <th>Hiking</th>
                                    <th>Parking</th>
                                    <th>Plug Point</th>
                                    <th>Surau</th>
                                    <th>WIFI</th>
                                </tr>
                                <tr>

                                <td>
                                    @if($data->roomamenities->BBQ_pit)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->event_space)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->gazebo)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->lake)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->playground)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->shower)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->waterfall)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->beach)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->farm)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->hiking)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->parking)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->plug)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->surau)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($data->roomamenities->wifi)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>


                                    <!-- <td>BBQ Pit</td>
                                    <td>Event Space</td>
                                    <td>Gazebo</td>
                                    <td>Lake</td>
                                    <td>Playground</td>
                                    <td>Shower</td>
                                    <td>Waterfall</td>
                                    <td>Beach</td>
                                    <td>Farm</td>
                                    <td>Hiking</td>
                                    <td>Parking</td>
                                    <td>Plug Point</td>
                                    <td>Surau</td>
                                    <td>WIFI</td> -->
                                </tr>

                                </table>
                                <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
                                
                                    <tr>
                                        <th width="125px">Location</th>
                                        <td>
                                        {{$data->location}}
                                        </td>
                                    </tr>
                                    </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@section('scripts')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
@endsection




