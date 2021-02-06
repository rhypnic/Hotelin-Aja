<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = ['kamar_id', 'profile_id', 'tggl_checkin', 'tggl_checkout', 'status'];
    protected $table = 'reservasi';
}