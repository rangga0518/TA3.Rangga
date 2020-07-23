<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    protected $guarded = [];
    
    protected function reservasi(){
        return $this->hasMany(Reservasi::class, 'id_restoran', 'id');
    }

    protected function pemesanan(){
        return $this->hasMany(Pemesanan::class, 'id_restoran', 'id');
    }
}
