@extends('layouts.pelanggan')

@section('title', 'Pemesanan')



@section('content')
                    <a href="{{URL('pemesanans/create')}}" class="btn btn-success">Pesan</a>

                    <div class="card" style="background: #f5f5f5">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Pemesanan</th>
                                            <th scope="col">Restoran</th>
                                            <th scope="col">Tanggal Pemesanan</th>
                                            <th scope="col">Total Pemesanan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanan as $pemesanan)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$pemesanan->restoran->nama_restoran}}</td>
                                            <td>{{$pemesanan->created_at}}</td>
                                            <td>Rp {{ number_format($pemesanan->hidangan->harga_hidangan * $pemesanan->jumlah_pesanan) }}</td>
                                            <td>{{$pemesanan->status_pemesanan}}</td>
                                            <td>
                                                <a href="{{URL('pemesanans/'.$pemesanan->id)}}" class="btn btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
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
