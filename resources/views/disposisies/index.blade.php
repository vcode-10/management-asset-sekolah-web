@extends('adminlte::page')

@section('title', 'Disposisi Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Disposisi Aset</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-0 pt-2 pl-2 pb-0 pr-0">
                    {{-- <a href="{{ route('lokasies.create') }}" class="btn btn-primary mb-2">
                        + Tambah Disposisi Aset
                    </a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                        + Tambah Disposisi Aset
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Aset</th>
                                <th>Disposisi Oleh</th>
                                <th>Alasan Disposisi</th>
                                <th>Biaya</th>
                                <th>Tanggal Disposisi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $i->aset->nama }}</td>
                                    <td>{{ $i->disposisi_oleh }}</td>
                                    <td>{{ $i->alasan_disposisi }}</td>
                                    <td id="harga">{{ $i->biaya }}</td>
                                    <td>{{ $i->tanggal_disposisi }}</td>
                                    <td>
                                        <a href="{{ route('disposisies.edit', $i) }}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('disposisies.destroy', $i) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="{{ route('disposisies.store') }}" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Disposisi Aset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="aset_id">Nama Aset</label>
                            <select name="aset_id" id="aset_id"
                                class="form-control @error('aset_id') is-invalid @enderror">
                                <option selected hidden disabled>Pilih Tipe Aset</option>
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
                                value="{{ old('disposisi_oleh') }}">
                            @error('disposisi_oleh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_disposisi">Tanggal Disposisi</label>
                            <input type="date" class="form-control @error('tanggal_disposisi') is-invalid @enderror"
                                id="tanggal_disposisi" name="tanggal_disposisi" value="{{ old('tanggal_disposisi') }}">
                            @error('tanggal_disposisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alasan_disposisi">Alasan Disposisi</label>
                            <input type="text" class="form-control @error('alasan_disposisi') is-invalid @enderror"
                                id="alasan_disposisi" placeholder="Masukkan Nama Pengaju" name="alasan_disposisi"
                                value="{{ old('alasan_disposisi') }}">
                            @error('alasan_disposisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                                name="biaya" value="{{ old('biaya') }}" placeholder="Rp. 500">
                            @error('biaya')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

        // select semua elemen yang memiliki class "harga"
        var elems = document.querySelectorAll('#harga');

        // iterasi setiap elemen
        for (var i = 0; i < elems.length; i++) {
            // ambil nilai harga dari tiap elemen
            var harga = elems[i].innerHTML;

            // format harga ke rupiah
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            // ubah nilai elemen menjadi format rupiah
            elems[i].innerHTML = formatter.format(harga);
        }

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
