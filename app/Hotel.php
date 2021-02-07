<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = "hotel";
    protected $fillable = ['nama_hotel', 'kategori', 'deskripsi', 'gambar_hotel', 'alamat', 'harga', 'user_id'];

    public function penyedia(){
        return $this->belongsTo('App\User', 'user_id');
    }
}