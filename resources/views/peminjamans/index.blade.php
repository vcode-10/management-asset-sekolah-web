@extends('adminlte::page')

@section('title', 'Peminjaman Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Peminjaman Aset</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-0 pt-2 pl-2 pb-0 pr-0">
                    <a href="{{ route('peminjamans.create') }}" class="btn btn-primary mb-2">
                        + Peminjaman Aset
                    </a>
                </div>
                <div class="card-body">


                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Aset</th>
                                <th>Lokasi Aset</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Tanggal Kembali</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $i->aset->nama }}</td>
                                    <td>{{ $i->aset->lokasi->nama }}</td>
                                    <td>{{ $i->peminjam->nama }}</td>
                                    <td>{{ $i->tanggal_pinjam }}</td>
                                    <td>{{ $i->tanggal_jatuh_tempo }}</td>
                                    <td>{{ $i->tanggal_kembali }}</td>
                                    <td>
                                        <a href="{{ route('peminjamans.edit', $i) }}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('peminjamans.destroy', $i) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Preview QR Code</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    {{ QrCode::size(400)->generate(bcrypt($i->id)) }}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ route('asets.show', $i) }}" class="btn btn-info" target="_blank">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
