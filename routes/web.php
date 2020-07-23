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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware'=> ['auth']], function(){
    
    Route::get('/pelanggan', 'PelangganController@index');

    Route::resource('pelanggan/reservasi', 'PelangganReservasiController');
	Route::resource('pelanggan/pemesanan', 'PelangganPemesananController');
	Route::resource('pelanggan/hidangan', 'PelangganHidanganController');
});

Route::group(['middleware'=> ['auth']], function(){
    
    Route::get('/pegawai', 'PegawaiController@index');

    Route::resource('reservasi', 'PegawaiReservasiController');
    Route::resource('pemesanan', 'PegawaiPemesananController');
    Route::resource('restoran', 'PegawaiRestoranController');
	Route::resource('hidangan', 'PegawaiHidanganController');
});


    