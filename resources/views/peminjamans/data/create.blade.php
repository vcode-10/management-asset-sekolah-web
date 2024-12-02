@extends('adminlte::page')

@section('title', 'Tambah Peminjam')

@section('content')
    <form action="{{ route('peminjams.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h5>Tambah Peminjam</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Peminjam</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Peminjam" name="nama" value="{{ old('nama') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="Masukkan alamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                placeholder="Masukkan telepon" name="telepon" value="{{ old('telepon') }}">
                            @error('telepon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('peminjams.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
