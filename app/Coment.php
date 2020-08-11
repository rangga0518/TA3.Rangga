<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(Coment::class, 'id_user', 'id');
    }
}
