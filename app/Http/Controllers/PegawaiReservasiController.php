<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use App\Restoran;
use App\User;

class PegawaiReservasiController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        return view('pegawai.reservasi.index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = User::all();
        $restoran = Restoran::all();
        return view('pegawai.reservasi.create',compact('pelanggan','restoran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'id_restoran' => 'required',
            'no_meja_reservasi' => 'required',
            'status_reservasi' => 'required'
            
            ]);
            Reservasi::create([
                'id_restoran' => $validateDate['id_restoran'],
                'id_user' => Auth::user()->id,
                'no_meja_reservasi' => $validateDate['no_meja_reservasi'],
                'status_reservasi' => $validateDate['status_reservasi']
            ]);
            return redirect()->route('reservasi.index');
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
    public function edit($id)
    {
        $reservasi = Reservasi::where('id', $id)->get();
        $restoran = Restoran::all();
        return view('pegawai.reservasi.edit', compact('restoran','reservasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'id_restoran' => $request->id_restoran,
            // 'id_user' => $request->id_user,
            'no_meja_reservasi' =>$request->no_meja_reservasi,
            'status_reservasi' => $request->status_reservasi,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Reservasi::where('id', $id)->update($data);
        return redirect()->route('reservasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
        return redirect()->route('reservasi.index');
    }
}
