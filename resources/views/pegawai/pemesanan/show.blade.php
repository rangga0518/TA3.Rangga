@extends('layouts.pegawai')

@section('title', 'Rincian Pemesanan')

@section('content')
<div class="col-lg-12">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">

                    <a href="{{URL('pemesanan/create')}}" class="btn btn-success">Tambah Pemesanan</a>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Nama Hidangan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga Hidangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail_pemesanan as $detail_pemesanan)
                            <tr>
                                <td>{{$detail_pemesanan->hidangan->nama_hidangan}}</td>
                                <td>{{$detail_pemesanan->hidangan->jenis_hidangan}}</td>
                                <td>{{$detail_pemesanan->hidangan->harga_hidangan}}</td>
                                <td>{{$detail_pemesanan->jumlah_pesanan}}</td>
                                <td>{{$detail_pemesanan->hidangan->harga_hidangan * $detail_pemesanan->jumlah_pesanan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
