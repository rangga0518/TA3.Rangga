@extends('layouts.pegawai')

@section('title', 'Tambah About')
@section('ckeditor')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection
@section('content')
        <div class="col-lg-8">
            <div class="card" style="background: #f5f5f5">
                <div class="basic-form">
                    <form method="POST" action="{{ URL('about') }}">
                        {{ csrf_field() }}
                    <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_about" name="nama_about" placeholder="Nama" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Text About</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="text_about" name="text_about" placeholder="Deskripsi" >
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'text_about' );
    </script>
@endsection