<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('welcome');



Route::group(['middleware'=> ['auth']], function(){
    
    Route::get('/pelanggan', 'PelangganController@index');

    Route::resource('reservasis', 'PelangganReservasiController');
    Route::resource('pemesanans', 'PelangganPemesananController');
	Route::resource('hidangans', 'PelangganHidanganController');
	Route::resource('komentar', 'ComentController');
});

Route::group(['middleware'=> ['auth']], function(){
    
    Route::get('/pegawai', 'PegawaiController@index');

    Route::resource('reservasi', 'PegawaiReservasiController');
    Route::resource('pemesanan', 'PegawaiPemesananController');
    Route::resource('restoran', 'PegawaiRestoranController');
	Route::resource('hidangan', 'PegawaiHidanganController');
	Route::resource('about', 'AboutController');
});


    