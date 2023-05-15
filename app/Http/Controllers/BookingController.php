<?php

namespace App\Http\Controllers;

use App\Models\Booking_comments;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Room;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.index',['data' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::all();
        $room = Room::all();
        return view('booking.create',['room'=>$room,'customer'=>$customer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' =>'required',
            'room_id' =>'required',
            'checkin_date' =>'required',
            'checkout_date' =>'required',
            'total_adults' =>'required',
        ]);

        $data = new Booking;
        //只有在一开始创建时才会 new 一个新数据集出来
        $data->customer_id = $request->customer_id;
        $data->room_id = $request->room_id;
        
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->total_adults = $request->total_adults;
        $data->total_children = $request->total_children;

        if ($request->ref == 'front') {
            $data->ref = 'front';
        }else{
            $data->ref = 'admin';
        }

        $data->save();
            //(the key of the session value, and the value itself)

        if($request->ref=='front'){
            return redirect('booking_user')->with('success','Booking has been added!');    
        }

        return redirect('admin/booking/create')->with('success','Booking has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::where('id',$id)->delete();
        return redirect('admin/booking')->with('success','data has been delete!');
    }

    // public function available_rooms(Request $request,$checkin_date){
    //     //此函数仅限于查看check-in 那天的日期

    //     $arooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
    //     //列出所有 房间id that 在它们的booking日期范围之内，checking的那天是否存在，然后 NOT IN 筛选出不在的 id ，再从 rooms 表里将它们的信息提出来
        
    //     $data=[];
    //     foreach ($arooms as $room) {
    //         $roomtypes = RoomType::find($room->room_type_id);
    //         $data[]= ['room'=>$room,'roomtype'=>$roomtypes]; 
    //     }

    //     return response()->json(['data'=>$data]);
    // }
    

    

}
