@extends('layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Customer
                            <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
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
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/customer/'.$data->id)}}">
                                    @csrf
                                    <!-- about csrf :It's not required for forms that only display data or perform GET requests.But pls add into all form, it's better. -->
                                    @method('put')
                                    <!-- HTML forms only support GET and POST HTTP methods by default. 
                                    Without the @method('put') directive, the form would default to using an HTTP POST request, which would typically create a new resource rather than updating an existing one. -->
                                    
                                
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Full Name<span class="text-danger">*</span></th>
                                        <td><input value="{{$data->full_name}}" name="full_name" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Email<span class="text-danger">*</span></th>
                                        <td><input value="{{$data->email}}" name="email" type="email" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Moblie<span class="text-danger">*</span></th>
                                        <td><input value="{{$data->mobile}}" name="mobile" type="text" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Photo (eg.receipt)</th>
                                        <td>
                                            <input name="photo" type="file"/>
                                            <input name="prev_photo" type="hidden" value="{{$data->photo}}" />
                                            <img width="100" src="{{asset(str_replace('public', 'storage_new', $data->photo))}}" />
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><textarea name="address" class="form-control">{{$data->address}}</textarea></td>
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
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
@endsection