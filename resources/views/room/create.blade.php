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

                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-danger">{{$error}}</p>
                            @endforeach
                            @endif 

                            @if(Session::has('success'))
                            <p class="text-success">{{Session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/rooms')}}">
                                    @csrf
                                    <!-- about csrf :It's not required for forms that only display data or perform GET requests.But pls add into all form, it's better. -->
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Select Roomtype</th>
                                        <td>
                                            <select name="rt_id" class="form-control">
                                                <option value="0">--- Select ---</option>
                                                @foreach($roomtypes as $rt)
                                                <option value="{{$rt->id}}">{{$rt->title}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td><input name="title" type="text" class="form-control" /></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Price</th>
                                        <td><input name="price" type="number" class="form-control" /></td>
                                    </tr>
                                    

                                    <tr>
                                        <th>Description</th>
                                        <td><textarea name="description" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><input name="phone" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Latitude</th>
                                        <td><input name="latitude" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><input name="address" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Facebook</th>
                                        <td><input name="facebook" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Gallery Images</th>
                                        <td><input type="file" multiple name="imgs[]"/></td>
                                    </tr>
                                    <tr>
                                        <th>Amenities</th>
                                        <td>
                                        <label><input type="checkbox" name="atv" value="1"> ATV</label><br>
                                        <label><input type="checkbox" name="cycling" value="1"> Cycling</label><br>
                                        <label><input type="checkbox" name="firepit" value="1"> Firepit</label><br>
                                        <label><input type="checkbox" name="kayak" value="1"> Kayak</label><br>
                                        <label><input type="checkbox" name="pet_friendly" value="1"> Pet Friendly</label><br>
                                        <label><input type="checkbox" name="rafting" value="1"> Rafting</label><br>

                                        <label><input type="checkbox" name="swimming_pool" value="1"> Swimming Pool</label><br>
                                        <label><input type="checkbox" name="archery" value="1"> Archery</label><br>
                                        <label><input type="checkbox" name="drinking_water" value="1"> Drinking Water</label><br>
                                        <label><input type="checkbox" name="fishing" value="1"> Fishing</label><br>
                                        <label><input type="checkbox" name="kitchen_sink" value="1"> Kitchen/Sink</label><br>
                                        <label><input type="checkbox" name="phone_coverage" value="1"> Phone Coverage</label><br>
                                        <label><input type="checkbox" name="river" value="1"> River</label><br>
                                        <label><input type="checkbox" name="toilet" value="1"> Toilet</label><br>
                                        <label><input type="checkbox" name="BBQ_pit" value="1"> BBQ Pit</label><br>
                                        <label><input type="checkbox" name="event_space" value="1"> Event Space</label><br>
                                        <label><input type="checkbox" name="gazebo" value="1"> Gazebo</label><br>
                                        <label><input type="checkbox" name="lake" value="1"> Lake</label><br>
                                        <label><input type="checkbox" name="playground" value="1"> Playground</label><br>
                                        <label><input type="checkbox" name="shower" value="1"> Shower</label><br>
                                        <label><input type="checkbox" name="waterfall" value="1"> Waterfall</label><br>
                                        <label><input type="checkbox" name="beach" value="1"> Beach</label><br>
                                        <label><input type="checkbox" name="farm" value="1"> Farm</label><br>
                                        <label><input type="checkbox" name="hiking" value="1"> Hiking</label><br>
                                        <label><input type="checkbox" name="parking" value="1"> Parking</label><br>
                                        <label><input type="checkbox" name="plug" value="1"> Plug</label><br>
                                        <label><input type="checkbox" name="surau" value="1"> Surau</label><br>
                                        <label><input type="checkbox" name="wifi" value="1"> WIFI</label><br>

                                        </td>
                                    </tr>


                                    <tr>
                                    <input type="hidden" name="location" value="">
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary" />
                                    </td>
                                    </tr>
                                    
                                </table>
                                </form>
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
    <script>
    const form = document.querySelector('form');
    form.addEventListener('submit', event => {
        event.preventDefault();

        const latitude = form.elements.latitude.value;
         
        const location = `POINT(${latitude})`;

        form.elements.location.value = location;

        form.submit();
    });
</script>
@endsection
@endsection