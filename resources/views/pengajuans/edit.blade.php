@extends('adminlte::page')

@section('title', 'Pengajuan / Permintaan Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Pengajuan / Permintaan Aset</h1>
@stop

@section('content')
    <form action="{{ route('pengajuans.update', $data) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

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
                            <label for="diminta_oleh">Nama Pengaju</label>
                            <input type="text" class="form-control @error('diminta_oleh') is-invalid @enderror"
                                id="diminta_oleh" placeholder="Masukkan Nama Pengaju" name="diminta_oleh"
                                value="{{ $data->diminta_oleh ?? old('diminta_oleh') }}">
                            @error('diminta_oleh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_diminta">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal_diminta') is-invalid @enderror"
                                id="tanggal_diminta" name="tanggal_diminta"
                                value="{{ $data->tanggal_diminta ?? old('tanggal_diminta') }}">
                            @error('tanggal_diminta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="Masukkan Nama Pengaju" name="keterangan"
                                value="{{ $data->keterangan ?? old('keterangan') }}">
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                name="jumlah" value="{{ $data->jumlah ?? old('jumlah') }}" min="1" max="99">
                            @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="{{ $data->status }}" hidden disabled>{{ $data->status }}</option>
                                <option value="Pending">Pending</option>
                                <option value="Diterima">Diterima</option>
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
    </form>
@stop
