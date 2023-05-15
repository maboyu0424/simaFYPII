<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Booking_comments;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Customer;
use App\Models\Roomimage;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
   public function index(){

    // $data = RoomType::all();
    // $roomtyple = Roomtype::all();
    
    $Lake = RoomType::where('title', 'Lake')->value('id');
    $Rainforest = RoomType::where('title', 'Rainforest')->value('id');
    $Sandbeach = RoomType::where('title', 'Sandbeach')->value('id');
    $Hill = RoomType::where('title', 'Hill')->value('id');

    

    $roomtype = RoomType::with('roomtypeimages')->get()->map(function ($roomtypes) {
        $roomtypes->first_image = $roomtypes->roomtypeimages->last();
        return $roomtypes;});
    
        return view('home',['data'=>$roomtype,'lake'=>$Lake,'rainforest'=>$Rainforest,'sandbeach'=>$Sandbeach,'hill'=>$Hill]);

   }

   public function about(){
    return view('about');
   }
    public function email_sending(Request $request){
        $request->validate([
            'full_name' => 'required',
            'number'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'msg'=>'required',
        ]);

        $data = array(
            'name' => $request->full_name,
            'number' => $request->number,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg'=> $request->msg,
        );
        Mail::send('mail', $data,function($message){
            $message->to('az491310187@qq.com','CodeArtisanLab')->subject('Laravel Html Testing Mail');
            $message->from('az491310187@gmail.com','simaboyu');
        });

        return redirect('/about')->with('success','Send Email Successfully!');  
   }

   public function login_user(){
    return view('login_user');
   }
    function check_login_user(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required',
             
        ]);


        $customer = Customer::where(['email'=>$request->email, 'password'=>$request->password])->count();

        if($customer>0){
            $customerdata = Customer::where(['email'=>$request->email, 'password'=>$request->password])->get();
            session(['customerdata'=>$customerdata]);
            
            if ($request->has('rememberme')) {
                Cookie::queue('email',$request->email,1440);
                Cookie::queue('customer_pwd',$request->password,1440);
            }

            return redirect('/');

        }else{
            return redirect('/login_user')->with('msg','Invalid username or password');
        }

    
   }

   public function logout_user(){
        session()->forget(['customerdata']);
            return redirect('/');
   }

   public function register_user(){
    return view('register_user');
   }

   public function front_booking(){
    $room = Room::all();
    return view('front-booking',['room'=>$room]);
   }

   public function booking_spe_campsite($id){
    $room = Room::findOrFail($id);
    return view('front-booking_spe',['room'=>$room]);
}

//user's all bookings
public function all_booking($id){
    $data = Booking::where('customer_id', $id)->get();
    

    return view('all_bookings', ['data' => $data]);
}



   public function show_deals(){
    // Get all rooms with their first corresponding image
    $rooms = Room::with('roomimages')->get()->map(function ($room) {
        $room->first_image = $room->roomimages->last();
        return $room;
    });

    $room2 = $rooms;
    return view('deals', ['room' => $rooms,'room2'=>$room2]);
   }

   public function check_price($id){
    $room = Room::find($id);
    return response()->json(['price' => $room->price]);
   }

   public function campsites_spe($id)
{   
    // Find the room type by ID
    $roomType = RoomType::find($id);

    // Get the rooms that belong to the room type
    $rooms = $roomType->rooms;

    // Get the last uploaded image for each room
    $roomImages = Roomimage::whereIn('room_id', $rooms->pluck('id'))
        ->latest('created_at')
        ->distinct('room_id')
        ->get();

    // Return the view with the rooms and images data
    return view('campsites_spe', [
        'roomType' => $roomType,
        'rooms' => $rooms,
        'roomImages' => $roomImages,
    ]);
    
}

public function details_campsite($id){
    $details = Room::findOrFail($id); // Find the room with the given ID or return a 404 error if not found
    $roomImages = $details->roomimages->take(12); // Get all the images for this room

    $comments = Booking_comments::where('room_id', $id)->get();


    return view('campsite_details', compact('details', 'roomImages','comments')); // Pass the room and its images to the view

}
// ✔

public function bookings_comments(Request $request){
    $request->validate([
        'booking_id' =>'required',
        'comment' =>'required',
        'customer_id'=>'required',
        'room_id'=>'required',
    ]);

    $data = new Booking_comments;
    $data->booking_id = $request->booking_id;
    $data->content = $request->comment;
    $data->customer_id = $request->customer_id;
    $data->room_id = $request->room_id;

    $data->save();

    
    return redirect()->back()->with('success', 'Comment has been added Successfully!');

}



}
