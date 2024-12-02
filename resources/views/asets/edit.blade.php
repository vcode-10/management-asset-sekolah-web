@extends('adminlte::page')

@section('title', 'Edit Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Aset</h1>
@stop

@section('content')
    <form action="{{ route('asets.update', $data) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama">Nama Aset</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Nama Tipe Aset" name="nama" value="{{ $data->nama ?? old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipe_aset_id">Tipe Aset</label>
                            <select name="tipe_aset_id" id="tipe_aset_id"
                                class="form-control @error('tipe_aset_id') is-invalid @enderror">
                                <option value='{{ $data->tipe_aset_id }}' hidden disabled>{{ $data->tipe_aset->nama }}
                                </option>
                                @foreach ($tipe as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
                                @endforeach
                            </select>
                            @error('tipe_aset_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

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

                        <div class="form-group">
                            <label for="kondisi_id">Kondisi Aset</label>
                            <select name="kondisi_id" id="kondisi_id"
                                class="form-control @error('kondisi_id') is-invalid @enderror">
                                <option value='{{ $data->kondisi_id }}' hidden disabled>{{ $data->kondisi->nama }}
                                </option>
                                @foreach ($kondisi as $kd)
                                    <option value="{{ $kd->id }}">{{ $kd->nama }}</option>
                                @endforeach
                            </select>
                            @error('kondisi_id')
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


                        <div class="form-group">
                            <label for="status">Kondisi Aset</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="{{ $data->status }}" hidden disabled>{{ $data->status }}</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                                <option value="Rusak">Rusak</option>
                                <option value="Sudah Dijual">Sudah Dijual</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('asets.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
