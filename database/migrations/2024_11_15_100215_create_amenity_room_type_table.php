<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenityRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity_room_type', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('amenities_id')->references('id')->on('amenities')->onDelete('cascade');
            $table->foreignUuid('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->enum('amenity_type', ['Utama', 'Kamar', 'Kamar Mandi']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenity_room_type');
    }
}
