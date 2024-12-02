@extends('adminlte::page')

@section('title', 'Disposisi Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Disposisi Aset</h1>
@stop

@section('content')
    <form action="{{ route('disposisies.update', $data) }}" method="post">
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
                            <label for="disposisi_oleh">Disposisi Oleh</label>
                            <input type="text" class="form-control @error('disposisi_oleh') is-invalid @enderror"
                                id="disposisi_oleh" placeholder="Masukkan nama" name="disposisi_oleh"
                                value="{{ $data->disposisi_oleh ?? old('disposisi_oleh') }}">
                            @error('disposisi_oleh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_disposisi">Tanggal Disposisi</label>
                            <input type="date" class="form-control @error('tanggal_disposisi') is-invalid @enderror"
                                id="tanggal_disposisi" name="tanggal_disposisi"
                                value="{{ $data->tanggal_disposisi ?? old('tanggal_disposisi') }}">
                            @error('tanggal_disposisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alasan_disposisi">Alasan Disposisi</label>
                            <input type="text" class="form-control @error('alasan_disposisi') is-invalid @enderror"
                                id="alasan_disposisi" placeholder="Masukkan Nama Pengaju" name="alasan_disposisi"
                                value="{{ $data->alasan_disposisi ?? old('alasan_disposisi') }}">
                            @error('alasan_disposisi')
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
                        <a href="{{ route('asets.index') }}" class="btn btn-default">
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
