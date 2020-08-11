<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $guarded = [];


    public function restoran(){
        return $this->belongsTo(Restoran::class, 'id_restoran', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
