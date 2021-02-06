<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('nama_hotel');
            $table->string('alamat_hotel');
            $table->string('gambar_hotel');
            $table->unsignedBigInteger('profile_id');

            $table->foreign('profile_id')->references('id')->on ('profile');
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
        Schema::dropIfExists('hotel');
    }
}