@extends('adminlte::page')

@section('title', 'Pemeliharaan Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Pemeliharaan Aset</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-0 pt-2 pl-2 pb-0 pr-0">
                    {{-- <a href="{{ route('lokasies.create') }}" class="btn btn-primary mb-2">
                        + Tambah Pemeliharaan Aset
                    </a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                        + Tambah Pemeliharaan Aset
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Aset</th>
                                <th>Tanggal Minta</th>
                                <th>Tanggal Selesai</th>
                                <th>Biaya</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $i->aset->nama }}</td>
                                    <td>{{ $i->tanggal_minta }}</td>
                                    <td>{{ $i->tanggal_selesai }}</td>
                                    <td id="harga">{{ $i->biaya }}</td>
                                    <td>{{ $i->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('pemeliharaans.edit', $i) }}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('pemeliharaans.destroy', $i) }}"
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
        <form action="{{ route('pemeliharaans.store') }}" method="post">
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
                            <label for="tanggal_minta">Tanggal Minta</label>
                            <input type="date" class="form-control @error('tanggal_minta') is-invalid @enderror"
                                id="tanggal_minta" name="tanggal_minta" value="{{ old('tanggal_minta') }}">
                            @error('tanggal_minta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                            @error('tanggal_selesai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" placeholder="Masukkan Nama Pengaju" name="keterangan"
                                value="{{ old('keterangan') }}">
                            @error('keterangan')
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
