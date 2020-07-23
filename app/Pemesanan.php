<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $guarded = [];


    public function detailpemesanan(){
        return $this->hasMany(Detailpemesanan::class, 'id_pemesanan', 'id');
    }

    public function restoran(){
        return $this->belongsTo(Restoran::class, 'id_restoran', 'id');
    }
}
