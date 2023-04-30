<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    function Roomtype(){
        //a one-to-many relationship between the current model and the "RoomType" model, where the current model belongs to the RoomType.
        return $this->belongsTo(RoomType::class,'room_type_id');
    }

    function roomimages(){
        return $this->hasMany(Roomimage::class,'room_id');
        //this room type has many images

        //are PHP classes that represent a table in the database
    }

    public function roomamenities()
    {
        return $this->hasOne(RoomAmenities::class,'room_id');
    }

}
