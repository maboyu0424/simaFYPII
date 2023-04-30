<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roomtypeimages', function (Blueprint $table) {
            $table->id();
            $table->integer('room_type_id');
            $table->text('img_src');
            $table->text('img_alt');
            $table->timestamps();
        });
    }
    //They provide a way to modify the structure of the database and keep track of these changes over time.

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roomtypeimages');
    }
};
