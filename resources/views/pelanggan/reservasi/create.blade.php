@extends('layouts.pelanggan')

@section('title', 'Buat Reservasi')



@section('content')
                    {{-- @foreach($reservasi as $reservasi) --}}

                    <div class="col-lg-6">
                        <div class="card" style="background: #f5f5f5">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('reservasis.store') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="nama">Nama</label>  
                                            <input type="text" class="form-control" id="nama" placeholder="{{Auth::user()->name}}" readonly="">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="{{Auth::user()->email}}" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_restoran">Restoran</label>
                                            <select name="id_restoran" class="form-control">
                                                @foreach($restoran as $restoran)
                                                <option value="{{$restoran->id}}">{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                            <a class="btn btn-danger" href="{{route('reservasis.index')}}">Batal</a>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
@endsection
