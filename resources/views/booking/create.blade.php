@extends('layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Booking
                            <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
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
                                        <th>Select Customers<span class="text-danger">*</span></th>
                                        <td>
                                            <select class="form-control" name="customer_id">
                                                <option>--- Select Customer ---</option>
                                               
                                                @foreach($customer as $customer)
                                                <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                               @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>CheckIn date<span class="text-danger">*</span></th>
                                        <td><input name="checkin_date" type="date" class="form-control checkin-date" /></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>CheckOut date<span class="text-danger">*</span></th>
                                        <td><input name="checkout_date" type="date" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Available Room</th>
                                        <td>
                                        <select class="form-control room-list" name="room_id">
                                        <option>--- Select Room ---</option>
                                               @foreach($room as $room)
                                                <option value="{{$room->id}}">{{$room->title}}</option>
                                               @endforeach
                                            </select>
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
                            
                        <div class="card-body">

                            
                </div>
                <!-- /.container-fluid -->
@section('scripts')
    <!-- Custom styles for this page -->
    <!-- <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> -->
    
    <!-- Page level plugins -->
    <!-- <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
<!-- <script type="text/javascript">
$(document).ready(function() {
    $('.checkin-date').on('blur', function(){
        var _checkindate = $(this).val();
        
        $.ajax({
            url: "{{url('admin/booking')}}/available-rooms/"+ _checkindate,
            dataType:'json',
            beforeSend:function () {
                $(".room-list").html('<option>--- Loading ---</option>');                
            },
            success:function (res) {
                var _html = "";
                $.each(res.data,function(index,row){
                    _html+='<option value="'+row.id +'">'+row.title+'</option>';
                });
                $(".room-list").html(_html);
            },
        });
    })
});
</script> -->

    
    @endsection



@endsection