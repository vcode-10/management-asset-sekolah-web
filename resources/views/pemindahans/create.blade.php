@extends('adminlte::page')

@section('title', 'Pemindahaan Aset')

@section('content')
    <form action="{{ route('pemindahans.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h5>Pemindahaan Aset</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="aset_id">Tipe Aset</label>
                            <select name="aset_id" id="aset_id"
                                class="form-control @error('aset_id') is-invalid @enderror">
                                <option selected hidden disabled>Pilih Aset</option>
                                @foreach ($aset as $as)
                                    <option value="{{ $as->id }}">{{ $as->nama }}</option>
                                @endforeach
                            </select>
                            @error('aset_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lokasi_id">Lokasi Aset</label>
                            <select name="lokasi_id" id="lokasi_id"
                                class="form-control @error('lokasi_id') is-invalid @enderror">
                                <option selected hidden disabled>Pilih Lokasi Aset</option>
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
                        <a href="{{ route('asets.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
