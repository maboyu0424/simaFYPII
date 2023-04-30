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
                            @if(Session::has('success'))
                            <p class="text-success">{{Session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/rooms/'.$data->id)}}">
                                    @csrf
                                    <!-- about csrf :It's not required for forms that only display data or perform GET requests.But pls add into all form, it's better. -->
                                    @method('put')
                                    <!-- HTML forms only support GET and POST HTTP methods by default. 
                                    Without the @method('put') directive, the form would default to using an HTTP POST request, which would typically create a new resource rather than updating an existing one. -->
                                    
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                        <th>Select Room Type</th>
                                        <td>
                                            <select name="rt_id" class="form-control">
                                                <option value="0">--- Select ---</option>
                                                @foreach($roomtypes as $rt)
                                                <option @if($data->room_type_id==$rt->id) selected @endif value="{{$rt->id}}">{{$rt->title}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>    
                                
                                     <tr>
                                        <th>Title</th>
                                        <td><input value="{{$data->title}}" name="title" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td><input value="{{$data->price}}" name="price" type="number" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><input value="{{$data->description}}" name="description" type="text" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Phone</th>
                                        <td><input value="{{$data->phone}}" name="phone" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Latitude</th>
                                        <td><input value="{{$data->latitude}}" name="latitude" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Longitude</th>
                                        <td><input value="{{$data->longitude}}" name="longitude" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><input value="{{$data->address}}" name="address" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Facebook</th>
                                        <td><input value="{{$data->facebook}}" name="facebook" type="text" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Gallery Images</th>
                                        <td>
                                            <table class="table table-bordered mt-3">
                                                <tr>
                                                    <input type="file" multiple name="imgs[]" />
                                                    @foreach($data->roomimages as $img)
                                                   <td class="imgcol{{$img->id}}">
                                                    <img width="200" src="{{asset(str_replace('public', 'storage_new', $img->img_src))}}" />
                                                    <p class="mt-2">
                                                        <button type="button" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm delete-image" data-image-id = "{{$img->id}}"><i class="fa fa-trash"></i></button></p>
                                                </td>
                                                    @endforeach
                                                </tr>
                                            </table>
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
    <!-- <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> -->
    
    <!-- Page level plugins -->
    <!-- <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
    
    <!-- 从本地存储和DB里删除照片 -->
    <script type="text/javascript"> 
        $(document).ready(function() {
            $(".delete-image").on('click',function() {
                var _img_id = $(this).attr('data-image-id');
                var _vm = $(this);
                $.ajax({
                    url: "{{url('admin/roomimage/delete')}}/"+_img_id,
                    // data: {

                    // },
                    dataType:'json',
                    beforeSend:function(){
                        _vm.addClass('disabled');
                    },
                    success:function(res){
                        if(res.bool==true){
                            $(".imgcol"+_img_id).remove();
                        }
                        _vm.removeClass('disabled');
                    },

                });
            })
        });
    </script>
    <!-- <script>
    const form = document.querySelector('form');
    form.addEventListener('submit', event => {
        event.preventDefault();

        const latitude = form.elements.latitude.value;
        const longitude = form.elements.longitude.value;
        const location = `POINT(${latitude} ${longitude})`;

        form.elements.location.value = location;

        form.submit();
    });
</script> -->
@endsection
@endsection