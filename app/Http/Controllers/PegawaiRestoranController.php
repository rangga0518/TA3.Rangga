<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restoran;

class PegawaiRestoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restoran = Restoran::all();
        return view('pegawai.restoran.index', compact('restoran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.restoran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_restoran' => 'required|unique:restorans',
            'alamat_restoran' => 'required'
        ]);
        Restoran::create($validatedData);
        return redirect()->route('restoran.index')->with('pesan', "Bagian $request->nama_restoran Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restoran $restoran)
    {
        return view('pegawai.restoran.edit', compact('restoran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restoran $restoran)
    {
        $validatedData = $request->validate([
            'nama_restoran' => 'required|unique:restorans,nama_restoran,'.$restoran->id,
            'alamat_restoran' => 'required'
        ]);

        $restoran->update($validatedData);
        return redirect()->route('restoran.index')->with('pesan',"Restoran $restoran->nama_restoran berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restoran $restoran)
    {
        $restoran->delete();
        return redirect()->route('restoran.index')->with('pesan', "Restoran $restoran->nama_restoran berhasil dihapus");
    }
}
