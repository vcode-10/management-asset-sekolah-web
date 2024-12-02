@extends('adminlte::page')

@section('title', 'Edit Pemindahan Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Pemindahan Aset</h1>
@stop

@section('content')
    <form action="{{ route('pemindahans.update', $data) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="lokasi_id">Lokasi Aset</label>
                            <select name="lokasi_id" id="lokasi_id"
                                class="form-control @error('lokasi_id') is-invalid @enderror">
                                <option value='{{ $data->lokasi_id }}' hidden disabled>{{ $data->lokasi->nama }}</option>
                                @foreach ($lokasi as $ls)
                                    <option value="{{ $ls->id }}">{{ $ls->nama }}</option>
                                @endforeach
                            </select>
                            @error('lokasi_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pemindahans.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
