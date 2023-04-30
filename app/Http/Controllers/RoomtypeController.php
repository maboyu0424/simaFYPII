<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType ;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\Storage;


class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RoomType::all();
        return view('roomtype.index',['data'=>$data]); // resources/views/roomtype/index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' =>'required',
            'detail' =>'required',
        ]);


        $data = new Roomtype;
        //只有在一开始创建时才会 new 一个新数据集出来
        $data->title = $request->title;
        // $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();
            //(the key of the session value, and the value itself)
        
        foreach($request->file('imgs') as $img){
            $imgPath=$img->store('public/imgs');
            $imgData = new Roomtypeimage;
            $imgData->room_type_id=$data->id;
            $imgData->img_src=$imgPath;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }


            return redirect('admin/roomtype/create')->with('success','data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = RoomType::find($id);
        return view('roomtype.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = RoomType::find($id);
        return view('roomtype.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = RoomType::find($id);
        $data->title = $request->title;
        // $data->price = $request->price;
        $data->detail = $request->detail;
        $data->save();

        if ($request->hasFile('imgs')) {
            foreach($request->file('imgs') as $img){
                $imgPath=$img->store('public/imgs');
                $imgData = new Roomtypeimage;
                $imgData->room_type_id=$data->id;
                $imgData->img_src=$imgPath;
                $imgData->img_alt=$request->title;
                $imgData->save();
            }
        }

        return redirect('admin/roomtype/'.$id.'/edit')->with('success','data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success','data has been delete!');
    }

    public function destroy_image(string $img_id)
    {
        $data = Roomtypeimage::where('id',$img_id)->first();
        // $path = str_replace('public', 'storage', $data->img_src);
        Storage::delete($data->img_src);
        
        Roomtypeimage::where('id',$img_id)->delete();
        return response()->json(['bool' => true]);
        //从本地存储和DB里删除照片
    }
}
