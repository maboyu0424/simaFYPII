<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Customer;
use App\Models\Roomimage;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index(){

    // $data = RoomType::all();
    $roomtyple = Roomtype::all();
    

    $roomtype = RoomType::with('roomtypeimages')->get()->map(function ($roomtypes) {
        $roomtypes->first_image = $roomtypes->roomtypeimages->last();
        return $roomtypes;});
    
        return view('home',['data'=>$roomtype]);

   }

   public function about(){
    return view('about');
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

   public function show_deals(){
    // Get all rooms with their first corresponding image
    $rooms = Room::with('roomimages')->get()->map(function ($room) {
        $room->first_image = $room->roomimages->last();
        return $room;
    });

    
    return view('deals', ['room' => $rooms]);
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

}
