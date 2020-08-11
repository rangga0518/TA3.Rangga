@extends('layouts.pelanggan')

@section('title', 'Tambah Komentar')
@section('ckeditor')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection
@section('content')
        <div class="col-lg-8">
            <div class="card" style="background: #f5f5f5">
                <div class="basic-form">
                    <form method="POST" action="{{ URL('komentar') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama</label>  
                            <input type="text" class="form-control" id="nama" placeholder="{{Auth::user()->name}}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" cols="20"></textarea>
                        </div>
                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection