<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('nama_kamar');
            $table->integer('jumlah_kamar');
            $table->text('fasilitas');
            $table->string('gambar_kamar');
            $table->integer('harga_kamar');
            $table->timestamps();
            $table->unsignedBigInteger('hotel_id');
            
            $table->foreign('hotel_id')->references('id')->on ('hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}