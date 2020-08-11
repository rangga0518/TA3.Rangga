<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;

class PelangganController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $dashboard = [
            'pemesanan_terakhir' => Pemesanan::where('jumlah_pesanan','harga_hidangan')->count(),
            'jumlah_pemesanan' => Pemesanan::count(),
        ];
        return view('pelanggan.index', compact('dashboard'));
    }
}
