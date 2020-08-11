<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hidangan;
use App\Restoran;
use App\About;
use App\Coment;

class IndexController extends Controller
{
    public function index()
    {
        $hidangan = Hidangan::all();
        $restoran = Restoran::all();
        $about = About::all();
        $coment = Coment::with(['user'])->get();
        return view('welcome', compact('hidangan', 'restoran','about','coment'));
    }
}
