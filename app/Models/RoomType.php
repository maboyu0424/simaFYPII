<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    function roomtypeimages(){
        return $this->hasMany(Roomtypeimage::class,'room_type_id');
        //this room type has many images

        //are PHP classes that represent a table in the database
    } 

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
