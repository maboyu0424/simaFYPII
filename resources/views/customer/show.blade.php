@extends('layout')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customer Details
                            <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>

                        
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>FullName</th>
                                        <td>
                                            {{$data->full_name}}
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Photo</th>
                                        <td>
                                        <img width="100" src="{{asset(str_replace('public', 'storage_new', $data->photo))}}" />
                                        </td>
                                    </tr>
                                     
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                        {{$data->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>
                                        {{$data->mobile}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                        {{$data->address}}
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