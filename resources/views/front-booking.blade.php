@extends('frontlayout')
@section('contentf')

<main>
<br>
<br>
<br>
<br>
<br>

<!-- Begin Page Content -->
<div class="container-fluid container"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 col-9">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Campsites Booking
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
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/booking')}}">
                                    @csrf
                                    <!-- about csrf :It's not required for forms that only display data or perform GET requests.But pls add into all form, it's better. -->
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                
                                    <tr>
                                        <th>CheckIn date<span class="text-danger">*</span></th>
                                        <td><input name="checkin_date" type="date" class="form-control checkin-date" /></td>
                                    </tr>

                                    <tr>
                                        <th>CheckOut date<span class="text-danger">*</span></th>
                                        <td><input name="checkout_date" type="date" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Available Room<span class="text-danger">*</span></th>
                                        <td>
                                        <select class="form-control room-list" name="room_id">
                                        <option name="room_id">--- Select Room ---</option>
                                               @foreach($room as $room)
                                                <option value="{{$room->id}}">{{$room->title}}</option>
                                               @endforeach
                                            </select>
                                            <br>
                                            Price:<div class="room_price"></div>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <th>Total Adults<span class="text-danger">*</span></th>
                                        <td><input name="total_adults" type="text" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Total Children</th>
                                        <td><input name="total_children" type="text" class="form-control"/></td>
                                    </tr>

                                    <input type="hidden" name="ref" value="front"/>
                                    <input type="hidden" name="customer_id" value="{{session('customerdata')[0]->id}}"/>
                                    <tr>
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

</main>
    <!-- Bootstrap core JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://127.0.0.1:8000/js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.room-list').on('change', function() {
        var _room_id = $(this).val();
        $.ajax({
            url: '/get-room-price/' + _room_id,
            dataType: 'json',
            beforeSend: function() {
                $(".room_price").html('Loading...');
            },
            success: function(data) {
                $('.room_price').html(data.price);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('.room_price').html('Error fetching room price.');
            }
        });
    });
});

</script>

@endsection

