@extends('adminlte::page')

@section('title', 'Tambah Tipe Aset')

@section('content')
    <form action="{{ route('tipe-asets.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h5>Tambah Tipe Aset</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Tipe Aset</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Tipe Aset" name="nama" value="{{ old('nama') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="Masukkan keterangan" name="keterangan"
                                value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('users.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
