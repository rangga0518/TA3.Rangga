@extends('layouts.pegawai')

@section('title', 'Buat Reservasi')



@section('content')
                <div class="col-lg-8">
                    <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('reservasi.store') }}">
                                    {{ csrf_field() }}


                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Restoran</label>
                                        <div class="col-sm-10">
                                            <select name="id_restoran" class="form-control">
                                                @foreach($restoran as $restoran)
                                                <option value="{{$restoran->id_restoran}}">{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                        <div class="col-sm-10">
                                            <select name="id_user" class="form-control">
                                                @foreach($pelanggan as $pelanggan)
                                                <option value="{{$pelanggan->id_user}}">{{$pelanggan->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}


                                    <div class="form-group row">
                                        <label for="no_meja_reservasi" class="col-sm-2 col-form-label">Nomor Meja</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_meja_reservasi" id="no_meja_reservasi" class="form-control @error('no_meja_reservasi') is-invalid @enderror"  autocomplete="off" value="{{ old('no_meja_reservasi') }}">
                                            @error('no_meja_reservasi')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status_reservasi" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status_reservasi" class="form-control">
                                                <option value="Batal">Batal</option>
                                                <option value="Dikonfirmasi">Dikonfirmasi</option>
                                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                <option value="Sedang Berlangsung">Sedang Berlangsung</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                        <a class="btn btn-danger" href="{{URL('reservasi')}}">Batal</a>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>

@endsection
