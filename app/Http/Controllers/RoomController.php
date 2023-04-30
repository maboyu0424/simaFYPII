<?php

namespace App\Http\Controllers;

use App\Models\Roomamenities;
use Illuminate\Http\Request;
use App\Models\RoomType ;
use App\Models\Room ;
use Illuminate\Support\Facades\DB;
use App\Models\Roomimage;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Room::all();
        return view('room.index',['data'=>$data]); // resources/views/room/index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $roomtypes = RoomType::all();
        return view('room.create',['roomtypes'=>$roomtypes]); // resources/views/room
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   


        $data = new Room;
        //只有在一开始创建时才会 new 一个新数据集出来
        // $data->id = $request->id;
        $data->room_type_id = $request->rt_id;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->phone = $request->phone;
        $data->location = $request->latitude;
        $data->address = $request->address;
        $data->facebook = $request->facebook;
        // $data->detail = $request->detail;
        $data->save();

        foreach($request->file('imgs') as $img){
            $imgPath=$img->store('public/imgs');
            $imgData = new Roomimage;
            $imgData->room_id=$data->id;
            $imgData->img_src=$imgPath;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }

        $AmenityData = new Roomamenities;
        $AmenityData->room_id = $data->id;
        $AmenityData->ATV = $request->input('atv', 0);
        $AmenityData->cycling = $request->input('cycling', 0);
        $AmenityData->firepit = $request->input('firepit', 0);
        $AmenityData->kayak = $request->input('kayak', 0);
        $AmenityData->pet_friendly = $request->input('pet_friendly', 0);
        $AmenityData->rafting = $request->input('rafting', 0);

        $AmenityData->swimming_pool = $request->input('swimming_pool', 0);
        $AmenityData->archery = $request->input('archery', 0);
        $AmenityData->drinking_water = $request->input('drinking_water', 0);
        $AmenityData->fishing = $request->input('fishing', 0);
        $AmenityData->kitchen_sink = $request->input('kitchen_sink', 0);
        $AmenityData->phone_coverage = $request->input('phone_coverage', 0);
        $AmenityData->river = $request->input('river', 0);
        $AmenityData->toilet = $request->input('toilet', 0);
        $AmenityData->BBQ_pit = $request->input('BBQ_pit', 0);
        $AmenityData->event_space = $request->input('event_space', 0);
        $AmenityData->gazebo = $request->input('gazebo', 0);
        $AmenityData->lake = $request->input('lake', 0);
        $AmenityData->playground = $request->input('playground', 0);
        $AmenityData->shower = $request->input('shower', 0);
        $AmenityData->waterfall = $request->input('waterfall', 0);
        $AmenityData->beach = $request->input('beach', 0);
        $AmenityData->farm = $request->input('farm', 0);
        $AmenityData->hiking = $request->input('hiking', 0);
        $AmenityData->parking = $request->input('parking', 0);
        $AmenityData->plug = $request->input('plug', 0);
        $AmenityData->surau = $request->input('surau', 0);
        $AmenityData->wifi = $request->input('wifi', 0);   
        $AmenityData->save();

            //(the key of the session value, and the value itself)
        return redirect('admin/rooms/create')->with('success','data has been added!');
    }

    /**
     * Display the specified resource.
     */
  
    public function show($id)
    {
        $data = Room::find($id);
        return view('room.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomtypes = RoomType::all();
        $data = Room::find($id);
        return view('room.edit',['data'=>$data,'roomtypes'=>$roomtypes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Room::find($id);
        $data->room_type_id = $request->rt_id;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->phone = $request->phone;
        $data->location = $request->latitude;
        $data->address = $request->address;
        $data->facebook = $request->facebook;
        // $data->detail = $request->detail;
        $data->save();

        if ($request->hasFile('imgs')) {
            foreach($request->file('imgs') as $img){
                $imgPath=$img->store('public/imgs');
                $imgData = new Roomimage;
                $imgData->room_id=$data->id;
                $imgData->img_src=$imgPath;
                $imgData->img_alt=$request->title;
                $imgData->save();
            }
        }

        $AmenityData = Roomamenities::find($id);
        $AmenityData->ATV = $request->input('ATV', 0);
        $AmenityData->cycling = $request->input('cycling', 0);
        $AmenityData->firepit = $request->input('firepit', 0);
        $AmenityData->kayak = $request->input('kayak', 0);
        $AmenityData->pet_friendly = $request->input('pet_friendly', 0);
        $AmenityData->rafting = $request->input('rafting', 0);

        $AmenityData->swimming_pool = $request->input('swimming_pool', 0);
        $AmenityData->archery = $request->input('archery', 0);
        $AmenityData->drinking_water = $request->input('drinking_water', 0);
        $AmenityData->fishing = $request->input('fishing', 0);
        $AmenityData->kitchen_sink = $request->input('kitchen_sink', 0);
        $AmenityData->phone_coverage = $request->input('phone_coverage', 0);
        $AmenityData->river = $request->input('river', 0);
        $AmenityData->toilet = $request->input('toilet', 0);
        $AmenityData->BBQ_pit = $request->input('BBQ_pit', 0);
        $AmenityData->event_space = $request->input('event_space', 0);
        $AmenityData->gazebo = $request->input('gazebo', 0);
        $AmenityData->lake = $request->input('lake', 0);
        $AmenityData->playground = $request->input('playground', 0);
        $AmenityData->shower = $request->input('shower', 0);
        $AmenityData->waterfall = $request->input('waterfall', 0);
        $AmenityData->beach = $request->input('beach', 0);
        $AmenityData->farm = $request->input('farm', 0);
        $AmenityData->hiking = $request->input('hiking', 0);
        $AmenityData->parking = $request->input('parking', 0);
        $AmenityData->plug = $request->input('plug', 0);
        $AmenityData->surau = $request->input('surau', 0);
        $AmenityData->wifi = $request->input('wifi', 0);     
        $AmenityData->save();


        return redirect('admin/rooms/'.$id.'/edit')->with('success','data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::where('id',$id)->delete();
        Roomamenities::where('room_id',$id)->delete();
        Roomimage::where('room_id',$id)->delete();
        return redirect('admin/rooms')->with('success','data has been delete!');
    }

    public function destroy_image(string $img_id)
    {
        $data = Roomimage::where('id',$img_id)->first();
        // $path = str_replace('public', 'storage', $data->img_src);
        Storage::delete($data->img_src);
        
        Roomimage::where('id',$img_id)->delete();
        return response()->json(['bool' => true]);
        //从本地存储和DB里删除照片
    }
}
