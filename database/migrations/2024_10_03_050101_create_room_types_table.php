<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('amanitie_id');
            $table->string('name');
            $table->float('price', 10, 2);
            $table->integer('max_guest');
            $table->text('description');
            $table->integer('number_of_room');
            $table->boolean('is_available')->default(true);
            $table->integer('size'); // persegi
            $table->integer('discount'); // percent
            $table->string('bed_type');
            $table->string('view')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_types');
    }
}
