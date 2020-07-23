<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_pemesanan extends Model
{
    protected $guarded = [];

    protected function pemesanan(){
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id');
    }

    protected function hidangan(){
        return $this->belongsTo(Hidangan::class, 'id_hidangan', 'id');
    }
    
}
