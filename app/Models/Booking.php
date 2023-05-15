<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    function customer(){
        return $this->belongsTo(Customer::class);
    }

    function room(){
        return $this->belongsTo(Room::class);
    }

    public function comment()
{
    return $this->hasMany(Booking_comments::class,'booking_id');
}

    //the belongsTo function is used to define a many-to-one relationship between two models
}
