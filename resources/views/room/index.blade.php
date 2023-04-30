@extends('layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rooms
                            <a href="{{url('admin/rooms/create')}}" class="float-right btn btn-success btn-sm">Add New</a>

                            </h6>
                        </div>
                        <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{Session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Campsite Types</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Phone</th>
                                            <!-- <th>Location</th> -->
                                            <th>Address</th>
                                            <th>Facebook</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <tr>
                                            <th>Id</th>
                                            <th>Campsite Types</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Phone</th>
                                            <!-- <th>Location</th> -->
                                            <th>Address</th>
                                            <th>Facebook</th>
                                            <th>Action</th>
                                            </tr>
                                    </tfoot>
                                    
                                    

                                    <tbody>
                                    
                                    @if($data)
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $d->id }}</td>
                                                <td width="100px">{{ $d->Roomtype->title}}</td>
                                                <td>{{ $d->title}}</td>
                                                <td>{{ $d->price}}</td>
                                                <!-- style="width: 680px;" -->
                                                <td>{{substr($d->description, 0, 45)}}</td>
                                                <td>{{ $d->phone}}</td>
                                                
                                                <td>{{substr($d->address, 0, 20)}}</td>
                                                <td>
                                                    @if ($d->facebook!="None")
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    @else
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/rooms/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="{{url('admin/rooms/'.$d->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('admin/rooms/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                 </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<!-- @section('scripts') -->
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<!-- @endsection -->
@endsection