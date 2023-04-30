@extends('layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$data->title}}
                            <a href="{{url('admin/roomtype')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>

                        
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Title</th>
                                        <td>
                                            {{$data->title}}
                                        </td>
                                    </tr> 
                                    
                                    <!-- price -->

                                    <tr>
                                        <th>Detail</th>
                                        <td>
                                        {{$data->detail}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Gallery Images</th>
                                        <td>
                                        <table class="table table-bordered mt-3">
                                                <tr>
                                                    @foreach($data->roomtypeimages as $img)
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