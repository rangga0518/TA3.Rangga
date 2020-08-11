@extends('layouts.pelanggan')

@section('title', 'Buat Pemesanan')



@section('content')
                    <div class="card">
                            <div class="basic-form">
                                 <form method="POST" action="{{ route('pemesanans.store') }}"> 
                                    {{ csrf_field() }}
                                    <input type="hidden" name="hidangan[]" class="hidangan">

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
                                        {{--  --}}
                                        
                                        {{--  --}}
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
                                                    <input type="hidden" name="id_hidangan" value="{{ $makanan->id }}">
                                                    <h4 class="card-title">{{$makanan->nama_hidangan}}</h4>
                                                    <p class="card-text">Rp {{$makanan->harga_hidangan}}</p>
                                                    <div class="row">
                                                                <input type="checkbox" class="my-3" style="margin: auto" data-value="{{ $makanan->id }}">
                                                                <select name="jumlah_pesanan" id="jumlah_pesanan" class="form-control" data-item="{{ $makanan->id }}">
                                                                    @for ($i = 0; $i < 10; $i++)
                                                                <option value="{{ $i }}" {{ $makanan->jumlah_pesanan == $i ? 'selected' : '' }} name="jumlah_pesanan">Jumlah {{$i}}</option>    
                                                                    @endfor
                                                                </select>
                                                        {{-- <input type="checkbox" class="form-control col-md-4" name="id_hidangan" value="{{$makanan->id}}">
                                                        <input type="hidden" class="form-control" name="harga_hidangan{{$makanan->id}}" value="{{$makanan->harga_hidangan}}">
                                                        <input type="text" class="form-control col-md-8" name="jumlah_pesanan" placeholder="Jumlah"> --}}
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="minuman" role="tabpanel">
                                            <div class="row">
                                                {{--  --}}
                                                {{-- <button type="button" class="nav-item btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    Pilih Minuman
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        ...
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div> --}}
                                                {{--  --}}
                                            @foreach($minuman as $minuman)
                                            <div class="col-md-3">
                                                <div class="card">
                                                  <img class="card-img-top" src="{{Storage::url($minuman->foto_hidangan)}}" alt="{{$minuman->nama_hidangan}}">
                                                  <div class="card-body">
                                                    <h4 class="card-title">{{$minuman->nama_hidangan}}</h4>
                                                    <p class="card-text">Rp {{$minuman->harga_hidangan}}</p>
                                                    <div class="row">
                                                        <input type="checkbox" class="form-control col-md-4" name="hidangan[]" value="{{$minuman->id_hidangan}}">
                                                        <input type="hidden" class="form-control" name="harga_hidangan{{$minuman->id_hidangan}}" value="{{$minuman->harga_hidangan}}">
                                                        <input type="text" class="form-control col-md-8" name="jumlah_hidangan{{$minuman->id_hidangan}}" placeholder="Jumlah">
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            </div>
                                        </div>
                                        
                                        <div style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-danger" href="{{URL('pemesanans')}}">Batal</a>
                                        </div>
                                    </div>                                    
                                </form>
                            </div>
                    </div>
@endsection

@push('js')
    {{-- <script>
        let hidangan = []
        let name = $('.hidangan');
        $('input[type="checkbox"]').each(function() {
            $(this).click(function() {
                hidangan.push($(this).data('value'))
                name.attr('value', `[${hidangan}]`).each(function(){
                    $('form').append(name)
                })
            })
        })
    </script> --}}
@endpush