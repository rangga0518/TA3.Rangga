@extends('layouts.pegawai')

@section('title', 'Edit Restoran')



@section('content')
<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            {{-- @foreach($restoran as $restoran) --}}
            <form method="POST" action="{{ route('about.update', ['about' => $about->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_about" name="nama_about" value="{{$about->nama_about}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Text About</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="text_about" name="text_about" value="{{$about->text_about}}" >
                    </div>
                </div>
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- @endforeach --}}
@endsection
