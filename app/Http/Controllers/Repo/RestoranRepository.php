<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restoran;

class RestoranRepository
{
    public function storeRestoran(Request $request){
        $validatedData = $request->validate([
            'nama_restoran' => 'required|unique:restorans',
            'alamat_restoran' => 'required'
        ]);
        $restoran = Restoran::create($validatedData);
        return $restoran;
    }

    public function updateRestoran(Request $request, Restoran $restoran){
        $validatedData = $request->validate([
            'nama_restoran' => 'required|unique:restorans,nama_restoran,'.$restoran->id,
            'alamat_restoran' => 'required'
        ]);

        $restoran->update($validatedData);
        return $restoran;
    }

    public function destroyRestoran(Restoran $restoran)
    {
        $restoran->delete();
        return $restoran;
    }
}
