@extends('adminlte::page')

@section('title', 'Edit Lokasi Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Lokasi Aset</h1>
@stop

@section('content')
    <form action="{{ route('lokasies.update', $data) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama">Lokasi Aset</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Lokasi Aset" name="nama" value="{{ $data->nama ?? old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" name="keterangan" value="{{ $data->keterangan ?? old('keterangan') }}">
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('lokasies.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
