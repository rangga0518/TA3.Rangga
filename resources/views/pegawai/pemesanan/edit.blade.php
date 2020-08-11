@extends('layouts.pegawai')

@section('title', 'Edit Pemesanan')



@section('content')

<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">


                    @foreach($pemesanan as $pemesanan)
                    <form method="POST" action="{{ route('pemesanan.update', ['pemesanan' => $pemesanan->id]) }}}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Restoran</label>
                            <div class="col-sm-10">
                                <select name="id_restoran" class="form-control">
                                    @foreach($restoran as $restoran)
                                    <option value="{{$restoran->id}}" @if($restoran->id == $pemesanan->id_restoran) selected @endif>{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ Auth::user()->name}}">
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <select name="id_pegawai" class="form-control">
                                    @foreach($pegawais as $pegawais)
                                    <option value="{{$pegawais->id_pegawai}}" @if($pegawais->id_pegawai == $pemesanan->id_pegawai) selected @endif>{{$pegawais->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total Pemesanan</label>
                            <div class="col-sm-10">
                                {{-- <input type="text" class="form-control" id="" name="jumlah_pesanan" value="{{$pemesanan->hidangan->harga_hidangan}}" > --}}
                                <input type="text" name="jumlah_pesanan" id="jumlah_pesanan" class="form-control @error('jumlah_pesanan') is-invalid @enderror" placeholder="Jumlah Pesanan" autocomplete="off" value="{{ old('jumlah_pesanan') ?? $pemesanan->hidangan->harga_hidangan*$pemesanan->jumlah_pesanan }}">
                                        @error('jumlah_pesanan')
                                            {{ $message }}
                                        @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status_pemesanan" class="form-control">
                                    <option value="Belum Lunas"
                                    @if($pemesanan->status_pemesanan=='Belum Lunas')
                                    selected
                                    @endif
                                    >Belum Dibayar</option>
                                    <option value="Lunas"
                                    @if($pemesanan->status_pemesanan=='Lunas')
                                    selected
                                    @endif
                                    >Lunas</option>
                                </select>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endforeach
        </div>
    </div>
</div>
@endsection
