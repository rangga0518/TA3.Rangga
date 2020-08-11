<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restoran;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\RestoranRepository;
class PegawaiRestoranController extends Controller
{
    
    protected $repo;

    public function __construct(){
        $this->repo = new RestoranRepository();
    }
    
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
        $this->repo->storeRestoran($request);
        return redirect()->route('restoran.index');
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
        $this->repo->updateRestoran($request, $restoran);
        return redirect()->route('restoran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restoran $restoran)
    {
        $this->repo->destroyRestoran($restoran);
        return redirect()->route('restoran.index')->with('pesan', "Restoran $restoran->nama_restoran berhasil dihapus");
    }
}
