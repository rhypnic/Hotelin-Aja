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
            $table->unsignedBigInteger('kamar_id');
            
            $table->foreign('kamar_id')->references('id')->on ('kamar');
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