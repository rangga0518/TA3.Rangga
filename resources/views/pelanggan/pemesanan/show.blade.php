@extends('layouts.pelanggan')

@section('title', 'Rincian Pemesanan')


@section('content')
                    <a href="{{URL('pemesanans')}}" class="btn btn-warning">Kembali</a><a href="{{URL('pemesanans/create')}}" class="btn btn-success">Pesan</a>

                    <div class="card" style="background: #f5f5f5">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Hidangan</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total Harga Hidangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_pemesanan as $detail_pemesanan)
                                        <tr>
                                            <td>{{$detail_pemesanan->hidangan->nama_hidangan}}</td>
                                            <td>{{$detail_pemesanan->hidangan->jenis_hidangan}}</td>
                                            <td>{{$detail_pemesanan->hidangan->harga_hidangan}}</td>
                                            <td>{{$detail_pemesanan->pemesanan->jumlah_pesanan}}</td>
                                            <td>{{$detail_pemesanan->hidangan->harga_hidangan*$detail_pemesanan->pemesanan->jumlah_pesanan}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script src="{{asset('ela/js/lib/datatables/datatables.min.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
                    <script src="{{asset('ela/js/lib/datatables/datatables-init.js')}}"></script>
@endsection
