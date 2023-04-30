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
        Schema::create('roomamenities', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('ATV');
            $table->integer('cycling');
            $table->integer('firepit');
            $table->integer('kayak');
            $table->integer('pet_friendly');
            $table->integer('rafting');
            $table->integer('swimming_pool');
            $table->integer('archery');
            $table->integer('drinking_water');
            $table->integer('fishing');
            $table->integer('kitchen_sink');
            $table->integer('phone_coverage');
            $table->integer('river');
            $table->integer('toilet');
            $table->integer('BBQ_pit');
            $table->integer('event_space');
            $table->integer('gazebo');
            $table->integer('lake');
            $table->integer('playground');
            $table->integer('shower');
            $table->integer('waterfall');
            $table->integer('beach');
            $table->integer('farm');
            $table->integer('hiking');
            $table->integer('parking');
            $table->integer('plug');
            $table->integer('surau');
            $table->integer('wifi');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roomamenities');
    }
};
