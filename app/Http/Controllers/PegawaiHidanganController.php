<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hidangan;
use Illuminate\Support\Facades\Storage;

class PegawaiHidanganController extends Controller
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
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();
        return view('pegawai.hidangan.index', compact('makanan','minuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.hidangan.create');
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
            'nama_hidangan' => 'required',
            'jenis_hidangan' => 'required',
            'harga_hidangan' => 'required',
            'foto_hidangan' => 'required'
            ]);
            $validateDate['foto_hidangan'] = $request->file('foto_hidangan')->store('asset/hidangan','public');
            Hidangan::create($validateDate);
            // $request->session()->flash('pesan', "Data baru berhasil di simpan ");
            return redirect()->route('hidangan.index');
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
    public function edit(Hidangan $hidangan)
    {
        return view('pegawai.hidangan.edit', ['hidangan' => $hidangan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hidangan $hidangan)
    {
        $validateDate = $request->validate([
            'nama_hidangan' => 'required',
            'jenis_hidangan' => 'required',
            'harga_hidangan' => 'required',
            'foto_hidangan' => 'image|max:2000',
            ]);
        $dataId = $hidangan->find($hidangan->id);
        $data = $request->all();
        if($request->foto_hidangan){
            Storage::delete('public/' .$dataId->foto_hidangan);
            $data['foto_hidangan'] = $request->file('foto_hidangan')->store('asset/hidangan','public');
        }
        $dataId->update($data);
        return redirect()->route('hidangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hidangan $hidangan)
    {
        Storage::delete('public/'.$hidangan->foto_hidangan);
        $hidangan->delete();
        return redirect()->route('hidangan.index')->with('pesan',"Hapus data $hidangan->nama_hidangan Berhasil");
    }
}
