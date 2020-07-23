<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hidangan extends Model
{
    protected $guarded = [];


    public function detail_pemesanan(){
        return $this->hasMany(Detail_pemesanan::class, 'id_hidangan', 'id');
    }
}
