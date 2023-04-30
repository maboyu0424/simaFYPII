@extends('layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update {{$data->title}}
                            <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>

                        
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{Session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/roomtype/'.$data->id)}}">
                                    @csrf
                                    <!-- about csrf :It's not required for forms that only display data or perform GET requests.But pls add into all form, it's better. -->
                                    @method('put')
                                    <!-- HTML forms only support GET and POST HTTP methods by default. 
                                    Without the @method('put') directive, the form would default to using an HTTP POST request, which would typically create a new resource rather than updating an existing one. -->
                                    
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Title</th>
                                        <td><input value="{{$data->title}}" name="title" type="text" class="form-control" /></td>
                                    </tr>
                                    

                                    <!-- Price -->

                                    
                                    <tr>
                                        <th>Detail</th>
                                        <td><textarea name="detail" class="form-control">{{$data->detail}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Gallery Images</th>
                                        <td>
                                            <table class="table table-bordered mt-3">
                                                <tr>
                                                    <input type="file" multiple name="imgs[]" />
                                                    @foreach($data->roomtypeimages as $img)
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
                    url: "{{url('admin/roomtypeimage/delete')}}/"+_img_id,
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
@endsection
@endsection