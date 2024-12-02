@extends('adminlte::page')

@section('title', 'Pemeliharaan Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Pemeliharaan Aset</h1>
@stop

@section('content')
    <form action="{{ route('pemeliharaans.update', $data) }}" method="post">
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
                                    @foreach ($tipe as $tp)
                                <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
                                @endforeach
                            </select>
                            @error('aset_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_minta">Tanggal Minta</label>
                            <input type="date" class="form-control @error('tanggal_minta') is-invalid @enderror"
                                id="tanggal_minta" name="tanggal_minta"
                                value="{{ $data->tanggal_minta ?? old('tanggal_minta') }}">
                            @error('tanggal_minta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                id="tanggal_selesai" name="tanggal_selesai"
                                value="{{ $data->tanggal_selesai ?? old('tanggal_selesai') }}">
                            @error('tanggal_selesai')
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
                            <label for="biaya">Biaya</label>
                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                                name="biaya" value="{{ $data->biaya ?? old('biaya') }}" placeholder="Rp. 500">
                            @error('biaya')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pemeliharaans.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('js')
    <script>
        // Ambil elemen input biaya
        const biayaInput = document.getElementById("biaya");

        // Format rupiah
        const formatRupiah = (angka) => {
            let reverse = angka.toString().split("").reverse().join("");
            let ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join(".").split("").reverse().join("");
            return "Rp. " + ribuan;
        };

        // Format rupiah pada saat user mengetik
        biayaInput.addEventListener("keyup", function(e) {
            biayaInput.value = formatRupiah(this.value.replace(/\D/g, ""));
        });
    </script>
@endpush
