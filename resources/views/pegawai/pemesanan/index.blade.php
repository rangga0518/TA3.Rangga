@extends('layouts.pegawai')

@section('title', 'Pemesanan')



@section('content')

<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<a href="{{URL('pemesanan/create')}}" class="btn btn-success">Tambah Pemesanan</a>

<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Pemesanan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Restoran</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Total Pemesanan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Diperbarui</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $pemesanan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pemesanan->user->name}}</td>
                        <td>{{$pemesanan->restoran->nama_restoran}}</td>
                        <td>{{$pemesanan->created_at}}</td>
                        <td>Rp {{number_format ($pemesanan->hidangan->harga_hidangan * $pemesanan->jumlah_pesanan)}}</td>
                        <td>{{$pemesanan->status_pemesanan}}</td>
                        <td>{{$pemesanan->updated_at}}</td>
                        <td>
                            <a href="{{URL('pemesanan/'.$pemesanan->id.'/edit')}}" class="btn btn-primary m-1" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{URL('pemesanan/'.$pemesanan->id)}}" class="btn btn-success m-1">
                                <i class="fa fa-eye"></i>
                            </a>
                            <form action="{{URL('pemesanan/'.$pemesanan->id)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger m-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@yield('js')
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{asset('ela/js/lib/datatables/datatables.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/datatables-init.js')}}"></script>


<script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
<!-- scripit init-->
<script type="text/javascript">
    $('form').submit(function(e){
        var form = this;
        e.preventDefault();
        swal({
                title: "Are you sure to delete ?",
                text: "You will not be able to recover this imaginary file !!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it !!",
                closeOnConfirm: false
            },
            function(){
                form.submit();
            }
        );
    });

</script>
@endsection
