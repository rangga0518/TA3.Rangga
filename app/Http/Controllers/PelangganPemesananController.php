<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Restoran;
use App\Hidangan;
use App\Detail_pemesanan;
use Illuminate\Support\Facades\Auth;


class PelangganPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::where('id_user', Auth::user()->id)->get();
        return view('pelanggan.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();
        $restoran = Restoran::all();
        return view('pelanggan.pemesanan.create', compact('makanan','minuman','restoran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->hidangan);
        $validateDate = $request->validate([
            'id_restoran' => 'required',
            'id_hidangan' => 'required',
            'jumlah_pesanan' => 'required'
            
        ]);
        $pemesanan = Pemesanan::create([
            'id_restoran' => $validateDate['id_restoran'],
            'id_user' => Auth::user()->id,
            // 'id_hidangan' => $validateDate['id_hidangan'],
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'status_pemesanan' => 'Belum Lunas'
        ]);
        return redirect()->route('pemesanans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_pemesanan = Detail_pemesanan::join('pemesanans', 'pemesanans.id', '=', 'detail_pemesanans.id')
        ->get();
        return view('pelanggan.pemesanan.show', compact('detail_pemesanan'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
