@extends('adminlte::page')

@section('title', 'Edit Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Aset</h1>
@stop

@section('content')
    <form action="{{ route('peminjamans.update', $data) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="aset_id">Nama Aset</label>
                            <select name="aset_id" id="aset_id"
                                class="form-control @error('aset_id') is-invalid @enderror">
                                <option value='{{ $data->aset_id }}' hidden disabled>{{ $data->aset->nama }}
                                    @foreach ($aset as $as)
                                <option value="{{ $as->id }}">{{ $as->nama }}</option>
                                @endforeach
                            </select>
                            @error('aset_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="peminjam_id">Lokasi Aset</label>
                            <select name="peminjam_id" id="peminjam_id"
                                class="form-control @error('peminjam_id') is-invalid @enderror">
                                <option value='{{ $data->peminjam_id }}' hidden disabled>{{ $data->peminjam->nama }}
                                    @foreach ($peminjam as $pm)
                                <option value="{{ $pm->id }}">{{ $pm->nama }}</option>
                                @endforeach
                            </select>
                            @error('peminjam_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                                id="tanggal_pinjam" name="tanggal_pinjam"
                                value="{{ $data->tanggal_pinjam ?? old('tanggal_pinjam') }}">
                            @error('tanggal_pinjam')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                            <input type="date" class="form-control @error('tanggal_jatuh_tempo') is-invalid @enderror"
                                id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo"
                                value="{{ $data->tanggal_jatuh_tempo ?? old('tanggal_jatuh_tempo') }}">
                            @error('tanggal_jatuh_tempo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                id="tanggal_kembali" name="tanggal_kembali"
                                value="{{ $data->tanggal_kembali ?? old('tanggal_kembali') }}">
                            @error('tanggal_kembali')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('peminjamans.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
