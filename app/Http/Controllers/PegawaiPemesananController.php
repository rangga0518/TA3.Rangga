<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Restoran;
use App\Hidangan;
use App\Detail_pemesanan;
use Illuminate\Support\Facades\Auth;

class PegawaiPemesananController extends Controller
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
        $pemesanan = Pemesanan::all();
        return view('pegawai.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();
        $restoran = Restoran::all();
        $cart = Pemesanan::all();
        return view('pegawai.pemesanan.create', compact('makanan','restoran','minuman','cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateDate = $request->validate([
            'id_restoran' => 'required',
            'id_hidangan' => 'required',
            'jumlah_pesanan' => 'required'
            
            ]);
            $pemesanan = Pemesanan::create([
                'id_restoran' => $validateDate['id_restoran'],
                'id_user' => Auth::user()->id,
                'id_hidangan' => $validateDate['id_hidangan'],
                'jumlah_pesanan' => $validateDate['jumlah_pesanan'],
                'status_pemesanan' => 'Belum Lunas'
            ]);
            dd($pemesanan);

        // $data = [
        //     'id_restoran' => $request->id_restoran,
        //     'id_user' => Auth::user()->id,
        //     'id_hidangan' => $request->id_hidangan,
        //     'jumlah_pesanan' => $request->jumlah_pesanan,
        //     'status_pemesanan' => $request->status_pemesanan
        // ];
        // Pemesanan::insert($data);

        // // 2.
        // $sql = Pemesanan::select('id')->where('id_user', '=', $pelanggan['id_user'])->orderBy('id', 'desc')->first();
        // $id_pemesanan = $sql['id'];

        // // 3.
        // $id_hidangan = $request->hidangan;

        // // 4.
        // $jumlah_pesanan = 0;

        // foreach ($id_hidangan as $id_hidangan) {
        //     $jml = 'jumlah_hidangan'.$id_hidangan;
        //     $hrg = 'harga_hidangan'.$id_hidangan;

        //     $jumlah_hidangan = $_POST[$jml];
        //     $harga_hidangan = $_POST[$hrg];
        //     $total_harga_hidangan = ((int)$jumlah_hidangan * (int)$harga_hidangan);
        //     $data2 = [
        //         'id_pemesanan' => $id_pemesanan,
        //         'id_hidangan' => $id_hidangan,
        //         'jumlah_hidangan' => $jumlah_hidangan,
        //         'total_harga_hidangan' => $total_harga_hidangan,
        //     ];
        //     Detail_Pemesanan::insert($data2);

        //     $jumlah_pesanan = $jumlah_pesanan + $total_harga_hidangan;
        // }

        // // 5.
        // $data3 = [
        //     'total_pemesanan' => $total_pemesanan,
        // ];
        // Pemesanan::where('id', $id_pemesanan)->update($data3);
        return redirect()->route('pemesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $detail_pemesanan)
    {
        return view('pegawai.pemesanan.show',compact('detail_pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::where('id', $id)->get();
        $restoran = Restoran::all();
        $pelanggan = Auth::user('role', 'user')->id;
        
        return view('pegawai.pemesanan.edit', compact('pemesanan','restoran','pelanggan'));
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
            // 'jumlah_pesanan' => $request->jumlah_pesanan,
            'status_pemesanan' => $request->status_pemesanan,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::where('id', $id)->update($data);
        return redirect()->route('pemesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanan.index');
    }
}
