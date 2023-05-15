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
        Schema::create('booking_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('customer_id');
            $table->integer('room_id');
            $table->text('content');

            $table->timestamps();

            // $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_comments');
    }
};
