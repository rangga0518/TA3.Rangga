<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $guarded = [];


    public function detailpemesanan(){
        return $this->hasMany(Detail_pemesanan::class, 'id_pemesanan', 'id');
    }

    public function restoran(){
        return $this->belongsTo(Restoran::class, 'id_restoran', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function hidangan(){
        return $this->belongsTo(Hidangan::class, 'id_hidangan', 'id');
    }
}
