<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table="profile";// jika tabelnyaa diganti
    protected $fillable=["nama", "phone_number","deskripsi","email","user_id"];
    public function pemilik()
    {
        return $this->belongsTo('App\user','user_id'); //arah foreign
    }
}