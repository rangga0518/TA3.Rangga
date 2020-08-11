@extends('layouts.pelanggan')

@section('title', 'Edit Restoran')
@section('ckeditor')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection
@section('content')
<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{ url('komentar/update', ['coment' => $coment->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
                <div class="form-group">
                    <label for="" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" value="{{$coment->description}}" >
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
    CKEDITOR.replace( 'description' );
</script>
@endsection
