@extends('layouts.pegawai')

@section('title', 'Buat Pemesanan')



@section('content')
                    <div class="card">
                            <div class="basic-form">
                                @if (Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error') }}
            </div>
        @endif

        
        @php
            $total = 0;
        @endphp
                                <form method="POST" action="{{ route('pemesanan.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="id">Restoran</label>
                                    <select name="id_restoran" class="form-control">
                                        @foreach($restoran as $restoran)
                                        <option value="{{$restoran->id}}">{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#makanan" role="tab"><span class="hidden-sm-up"><i class="ti-fire"></i></span> <span class="hidden-xs-down">Makanan</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#minuman" role="tab"><span class="hidden-sm-up"><i class="ti-fire"></i></span> <span class="hidden-xs-down">Minuman</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="makanan" role="tabpanel">
                                        <div class="row">
                                        @foreach($makanan as $makanan)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="{{Storage::url($makanan->foto_hidangan)}}" alt="{{$makanan->nama_hidangan}}">
                                                <div class="card-body">
                                                
                                                <h4 class="card-title">{{$makanan->nama_hidangan}}</h4>
                                                <p class="card-text">Rp {{$makanan->harga_hidangan}}</p>
                                                {{-- @foreach ($makanan as $makanan) --}}
                                                <div class="row">
                                                    
                                                    <input type="hidden" name="id_hidangan" value="{{ $makanan->id }}">
                                                    <select name="jumlah_pesanan" id="jumlah_pesanan" class="form-control" data-item="{{ $makanan->id }}">
                                                        @for ($i = 0; $i < 10; $i++)
                                                    <option value="{{ $i }}" {{ $makanan->jumlah_pesanan == $i ? 'selected' : '' }} name="jumlah_pesanan">Jumlah {{$i}}</option>    
                                                        @endfor
                                                    </select>
                                                
                                                </div>    
                                                {{-- @endforeach --}}
                                                
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="minuman" role="tabpanel">
                                        <div class="row">
                                        @foreach($minuman as $minuman)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="{{Storage::url($minuman->foto_hidangan)}}" alt="{{$minuman->nama_hidangan}}">
                                                <div class="card-body">
                                                <input type="hidden" name="id_hidangan" value="{{$minuman->id}}">
                                                <h4 class="card-title">{{$minuman->nama_hidangan}}</h4>
                                                <p class="card-text">Rp {{$minuman->harga_hidangan}}</p>
                                                <div class="row">
                                                    <select name="jumlah_pesanan" id="jumlah_pesanan" class="quantity">
                                                                @for ($i = 0; $i < 10; $i++)
                                                            <option value="{{ $i }}" {{ $minuman->jumlah_pesanan == $i ? 'selected' : '' }}>Jumlah {{$i}}</option>    
                                                                @endfor
                                                    </select>
                                                    {{-- <input type="checkbox" class="form-control col-md-4" name="hidangan[]" value="{{$minuman->id}}">
                                                    <input type="hidden" class="form-control" name="id_hidangan" value="{{$minuman->id}}"> --}}
                                                    {{-- <input type="number" class="form-control col-md-8" name="jumlah_pesanan" id="jumlah_pesanan"  placeholder="Jumlah"> --}}
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    
                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-danger" href="{{URL('pemesanan')}}">Batal</a>
                                    </div>
                                </div>                                    
                            </form>
                                {{-- @php
                                    $total += ($pemesanan->hidangan->harga_hidangan * $pemesanan->jumlah_pesanan)
                            @endphp --}}
                            </div>
                    </div>
@endsection

@section('js')
<script>
    (function(){
        const classname = document.querySelectorAll('.quantity');

        Array.from(classname).forEach(function(element){
            element.addEventListener('change', function(){
                const id = element.getAttribute('data-item');
                axios.patch(`/pemesanan/create/${id}`,{
                    quantity: this.value,
                    id: id
                })
                .then(function(response){
                    window.location.href = '/pemesanan'
                })
                .catch(function(error){
                    console.log(error)
                })
            })
        })
    })();
</script>
@endsection