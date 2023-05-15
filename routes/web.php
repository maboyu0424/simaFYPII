<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('dashboard');
});
//User login
Route::get('/register_user', [HomeController::class,'register_user']);
Route::get('/login_user', [HomeController::class,'login_user']);
Route::post('/login_user_check', [HomeController::class,'check_login_user']);
Route::get('/logout_user', [HomeController::class,'logout_user']);
Route::get('/booking_user', [HomeController::class,'front_booking']);
Route::get('/booking_user/all_bookings/{id}', [HomeController::class,'all_booking']);

// ....
Route::get('/', [HomeController::class,'index']);
Route::get('/about', [HomeController::class,'about']);
Route::post('about/email', [HomeController::class,'email_sending']);

// ------------------------------------------------------------------------------------------------------------

Route::get('admin/login', [AdminController::class,'login']);
Route::post('admin/login', [AdminController::class,'check_login']);
Route::get('admin/logout', [AdminController::class,'logout']);

Route::get('admin', [AdminController::class,'dashboard']);

//roomtype
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class,'destroy']);
//When a user navigates to this URL, Laravel will call the destroy method in the RoomtypeController class.

Route::resource('admin/roomtype', RoomtypeController::class);

//-------------------------------------------------------------------------------------------------------------
//rooms
Route::resource('admin/rooms', RoomController::class);
Route::get('admin/rooms/{id}/delete', [RoomController::class,'destroy']);

//-------------------------------------------------------------------------------------------------------------
//Customers
Route::resource('admin/customer', CustomerController::class);
Route::get('admin/customer/{id}/delete', [CustomerController::class,'destroy']);

//-------------------------------------------------------------------------------------------------------------
//Delete images
Route::get('admin/roomtypeimage/delete/{id}', [RoomtypeController::class,'destroy_image']);
Route::get('admin/roomimage/delete/{id}', [RoomController::class,'destroy_image']);

//--------------------------------------------------------------------------------------------------------------
//Bookings
Route::get('admin/booking/{id}/delete', [BookingController::class,'destroy']);
// Route::get('admin/booking/available-rooms/{checkin_date}', [BookingController::class,'available_rooms']);
Route::resource('admin/booking', BookingController::class);

//------------------------------------------------------------------------------------------------
//Deals page
Route::get('/deals', [HomeController::class,'show_deals']);

//------------------------------------------------------------------------------------------------
//get room prices
Route::get('/get-room-price/{id}', [HomeController::class,'check_price']);

//Specific campsites

Route::get('/campsites_spe/{id}', [HomeController::class,'campsites_spe']);

Route::get('/campsites_spe/details/{id}', [HomeController::class,'details_campsite']);

//Specific booking page
Route::get('/campsites_spe/specific_booking/{id}', [HomeController::class,'booking_spe_campsite']);

//comments
Route::post('comments', [HomeController::class,'bookings_comments']);