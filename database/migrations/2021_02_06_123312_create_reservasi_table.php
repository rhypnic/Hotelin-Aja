<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->date('tggl_checkin');
            $table->date('tggl_checkout');
            $table->timestamps();
            $table->integer('kamar_id');
            $table->string('nama_hotel');
            $table->unsignedBigInteger('profile_id');
            
            $table->foreign('user_id')->references('id')->on ('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi');
    }
}