@extends('adminlte::page')

@section('title', 'Pengajuan Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Pengajuan Aset</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-0 pt-2 pl-2 pb-0 pr-0">
                    {{-- <a href="{{ route('lokasies.create') }}" class="btn btn-primary mb-2">
                        + Tambah Pengajuan Aset
                    </a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                        + Tambah Pengajuan Aset
                    </button>
                </div>
                <div class="card-body">


                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tipe Aset</th>
                                <th>Nama pengaju</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $i->tipe_aset->nama }}</td>
                                    <td>{{ $i->diminta_oleh }}</td>
                                    <td>{{ $i->tanggal_diminta }}</td>
                                    <td>{{ $i->keterangan }}</td>
                                    <td>{{ $i->jumlah }}</td>
                                    <td>
                                        @if ($i->status == 'Pending')
                                            <span class="badge badge-danger">{{ $i->status }}</span>
                                        @else
                                            <span class="badge badge-success">{{ $i->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pengajuans.edit', $i) }}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('pengajuans.destroy', $i) }}"
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="{{ route('pengajuans.store') }}" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengajuan/Permintaan Aset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="tipe_aset_id">Tipe Aset</label>
                            <select name="tipe_aset_id" id="tipe_aset_id"
                                class="form-control @error('tipe_aset_id') is-invalid @enderror">
                                <option selected hidden disabled>Pilih Tipe Aset</option>
                                @foreach ($tipe as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
                                @endforeach
                            </select>
                            @error('tipe_aset_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="diminta_oleh">Nama Pengaju</label>
                            <input type="text" class="form-control @error('diminta_oleh') is-invalid @enderror"
                                id="diminta_oleh" placeholder="Masukkan Nama Pengaju" name="diminta_oleh"
                                value="{{ old('diminta_oleh') }}">
                            @error('diminta_oleh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_diminta">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal_diminta') is-invalid @enderror"
                                id="tanggal_diminta" name="tanggal_diminta" value="{{ old('tanggal_diminta') }}">
                            @error('tanggal_diminta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="Masukkan Nama Pengaju" name="keterangan"
                                value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                name="jumlah" value="{{ 1 ?? old('jumlah') }}" min="1" max="99">
                            @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
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
