<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_comments extends Model
{
    use HasFactory;

    public function booking()
{
    return $this->belongsTo(Booking::class,'booking_id');
}
function customer(){
    return $this->belongsTo(Customer::class,'customer_id');
}

function room(){
    return $this->belongsTo(Room::class,'id');
}

}
