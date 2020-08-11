<?php

namespace App\Http\Controllers;

use App\Coment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coment = Coment::where('id_user', Auth::user()->id)->get();
        return view ('front.coment.index', compact('coment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.coment.create');
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
            'description' => 'required'
        ]);
        Coment::create([
            'description' => $validatedData['description'],
            'id_user' => Auth::user()->id,

        ]);
        return redirect()->route('komentar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function show(Coment $coment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function edit(Coment $coment)
    {
        // return view('front.coment.edit', compact('coment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coment $coment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coment  $coment
     * @return \Illuminate\Http\Response
     */
    public function destroy($coment)
    {
        $data = Coment::findOrFail($coment);
        $data->delete();
        return redirect()->route('komentar.index');
        
    }
}
