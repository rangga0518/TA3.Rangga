<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Reservasi;
use App\Hidangan;
use App\User;

class PegawaiController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $pesanan = Pemesanan::all();
        $reservasi = Reservasi::all();
        $dashboard = [
            'jumlah_pelanggan' => User::where('role','user')->count(),
            'jumlah_pesanan' => Pemesanan::count(),
            'jumlah_reservasi' => Reservasi::count(),
            'jumlah_hidangan' => Hidangan::count(),
        ];
        return view('pegawai.index', compact('dashboard','pesanan','reservasi'));
    }
}
