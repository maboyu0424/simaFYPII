@extends('frontlayout')
@section('contentf')

<main>
<br>
<br>

<div class="page-heading page-heading-img-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Hope you'll have a nice trip!</h4>
          <h2>Your Bookings</h2>
          <!-- <div class="border-button"><a href="about.html">Discover More</a></div> -->
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
                    <!-- Begin Page Content -->
                <div class="container-fluid"> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Bookings
                            <a href="{{url('/booking_user')}}" class="float-right btn btn-success btn-sm" style="float: right;">Back</a>
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
                                            <th>Customer</th>                                        
                                            <th>Room </th>
                                            <th>RoomType</th>
                                            <th>CheckIn Date</th>
                                            <th>CheckOut Date</th>
                                            <th>Ref</th>
                                            <th>Action</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                  
                                    
                                    

                                    <tbody>
                                    
                                    @if($data)
                                        @foreach ($data as $booking)
                                            <tr>
                                            <td>{{ $booking->id }}</td>
                                                <td>{{ $booking->customer->full_name ?? 'N/A'}}</td>
                                                <td>{{ $booking->room->title ?? 'N/A'}}</td>                                                
                                                <td>{{ $booking->room->Roomtype->title ?? 'N/A'}}</td>
                                                <td>{{ $booking->checkin_date ?? 'N/A'}}</td>
                                                <td>{{ $booking->checkout_date ?? 'N/A'}}</td>
                                                <td>{{ $booking->ref ?? 'N/A'}}</td>
                                                <td>
                                                <p>In progress <i class="fa fa-users" style="color: #9fadc6;"></i></p>
                                                </td> 
                                                <td>
                                                <button id="add-comment-btn" class="btn btn-primary">Add Comment</button>  
                                                
                                                <div id="comment-box" class="bg-white p-3 rounded position-fixed bottom-0 end-0 m-3" style="display: none;">
                                                
                                                <form style="position: fixed;
                                                            top: 50%;
                                                            left: 50%;
                                                            transform: translate(-50%, -50%);
                                                            z-index: 9999;
                                                            background-color: white;
                                                            border: 1px solid gray;
                                                            padding: 20px;
                                                            box-shadow: 0px 0px 10px gray;
                                                            width: 500px;
                                                            height: 300px;" method="post" enctype="multipart/form-data" action="{{url('comments')}}">
                                                     @csrf
                                                     <h5 class="mb-3">Add a Comment</h5>
                                                     <button  type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2" aria-label="Close" onclick="closeCommentBox()"></button>
                                                     <div class="mb-12 "  >
                                                    <label for="comment-input" class="form-label">Comment</label>
                                                    <textarea name="comment" class="form-control" id="comment-input" rows="5"></textarea>
                                                    </div>
                                                    <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                                    <input type="hidden" name="customer_id" value="{{$booking->customer_id}}">
                                                    <input type="hidden" name="room_id" value="{{$booking->room_id}}">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                                </div>

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

</main>
    <!-- Bootstrap core JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://127.0.0.1:8000/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://127.0.0.1:8000/js/sb-admin-2.min.js"></script>

    <style>
.comment-box {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999;
  background-color: white;
  border: 1px solid gray;
  padding: 20px;
  box-shadow: 0px 0px 10px gray;
  width: 500px;
  height: 300px;
}
</style>

<script>
    function closeCommentBox() {
  // Get the comment box element
  var commentBox = document.getElementById("comment-box");

  // Hide the comment box by setting its display property to "none"
  commentBox.style.display = "none";
}
</script>


<script>
  // Get the button and comment box elements
  const addCommentBtn = document.getElementById('add-comment-btn');
  const commentBox = document.getElementById('comment-box');

  // Add a click event listener to the button
  addCommentBtn.addEventListener('click', () => {
    // Show the comment box
    commentBox.style.display = 'block';
  });

  // Add a submit event listener to the comment form
  const commentForm = document.getElementById('comment-form');
  commentForm.addEventListener('submit', async (event) => {
    // Prevent the default form submission
    event.preventDefault();

    // Get the comment input value
    const commentInput = document.getElementById('comment-input');
    const comment = commentInput.value;

    // Reset the form and hide the comment box
    commentForm.reset();
    commentBox.style.display = 'none';

    // Send the comment to the server using a POST request
    const response = await fetch('/comments', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ comment })
    });

    // Check if the comment was successfully submitted
    if (response.ok) {
      alert('Comment submitted!');
      
      // Update the text of the "Add Comment" button to "Commented"
      const addCommentBtnText = document.getElementById('add-comment-btn-text');
      addCommentBtnText.innerText = 'Commented';
    } else {
      alert('Error submitting comment!');
    }
  });
</script>



@endsection