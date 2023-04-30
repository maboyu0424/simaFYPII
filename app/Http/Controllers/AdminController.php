<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Cookie;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
        function login(){
            return view('login');
        }

        function check_login(Request $request){
            $request->validate([
                'username' =>'required',
                'password' =>'required',
                 
            ]);

            $admin = Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->count();

            if($admin>0){
                $admindata = Admin::where(['username'=>$request->username, 'password'=>sha1($request->password)])->get();
                session(['admindata'=>$admindata]);
                
                if ($request->has('rememberme')) {
                    Cookie::queue('adminuser',$request->username,1440);
                    Cookie::queue('adminpwd',$request->password,1440);
                }

                return redirect('admin');

            }else{
                return redirect('admin/login')->with('msg','Invalid username or password');
            }

        }

        function logout(){
            session()->forget(['admindata']);
            return redirect('admin/login');
        }

        function dashboard(){
            $bookings = Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
            //data sample: 
            //Total bookings on 2023-04-20: 2
            // Total bookings on 2023-04-21: 1
            // Total bookings on 2023-04-23: 1
            // Total bookings on 2023-04-24: 1

            $labels = [];
            $data = [];

            foreach ($bookings as $booking) {
                $labels[] = $booking['checkin_date'];
                $data[] = $booking['total_bookings'];
            }

            $rbookings =  DB::table('rooms as r')
            ->join('bookings as b','b.room_id','=','r.id')
            ->select('r.*','b.*',DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.id') //意思就是把数据整理成清晰的，按房间类型划分的数据， so this function will sort the data into a table that group by the room type id;
            ->get();

            $plabels = [];
            $pdata = [];

            foreach ($rbookings as $rbooking) {
                $plabels[] = $rbooking->title;
                $pdata[] = $rbooking->total_bookings;
            }

            // echo '<pre>';
            // print_r($rtbookings);

            return view('dashboard',['labels'=>$labels, 'data'=>$data,'plabels'=>$plabels, 'pdata'=>$pdata]);
        }

    }
