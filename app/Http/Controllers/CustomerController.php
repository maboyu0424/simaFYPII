<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::all();
        return view('customer.index',['data'=>$data]); // resources/views/customer/index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'full_name' =>'required',
            'email' =>'required|email',
            'password' =>'required',
            'mobile' =>'required',
        ]);

        
            $imgPath=$request->file('photo')->store('public/imgs');
         

        $data = new Customer;
        //只有在一开始创建时才会 new 一个新数据集出来
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        
        $data->password = $request->password;
        
        // $data->password = md5($request->password);
        // $data->password = sha1($request->password);
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        // $data->photo = $request->photo;
        $data->photo=$imgPath;
        $data->save();
            //(the key of the session value, and the value itself)
        
            $ref = $request->ref;
            if ($ref=="front") {
                return redirect('login_user')->with('email',$data->email);
            }

            return redirect('admin/customer/create')->with('success','data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Customer::find($id);
        return view('customer.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Customer::find($id);
        return view('customer.edit',['data'=>$data]);



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'full_name' =>'required',
            'email' =>'required|email',
            'mobile' =>'required',
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else{
            $imgPath=$request->prev_photo;
        }

        $data = Customer::find($id);
        //只有在一开始创建时才会 new 一个新数据集出来
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        
        // $data->password = $request->password;
        
        // $data->password = md5($request->password);
        // $data->password = sha1($request->password);
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        // $data->photo = $request->photo;
        $data->photo=$imgPath;
        $data->save();

        return redirect('admin/customer/'.$id.'/edit')->with('success','data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::where('id',$id)->delete();
        return redirect('admin/customer')->with('success','data has been delete!');
    }

}
