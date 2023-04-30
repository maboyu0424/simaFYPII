@extends('frontlayout')
@section('contentf')
<main>
    <br>
    <br>
    <br>
    <br>
    <div class="container col-lg-6 col-sm-6 col-6">
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
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/customer')}}">
                                    @csrf
                                    <!-- about csrf :It's not required for forms that only display data or perform GET requests.But pls add into all form, it's better. -->
                                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Full Name<span class="text-danger">*</span></th>
                                        <td><input name="full_name" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Email<span class="text-danger">*</span></th>
                                        <td><input name="email" type="email" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Password<span class="text-danger">*</span></th>
                                        <td><input name="password" type="password" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Moblie<span class="text-danger">*</span></th>
                                        <td><input name="mobile" type="text" class="form-control" /></td>
                                    </tr>

                                    <tr>
                                        <th>Photo</th>
                                        <td><input name="photo" type="file"/></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><textarea name="address" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" name="ref" value="front" />
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary" />
                                    </td>
                                    </tr>
                                    
                                </table>
                                </form>
                                </div>
                        </div>
</div>
    
</main>
@endsection