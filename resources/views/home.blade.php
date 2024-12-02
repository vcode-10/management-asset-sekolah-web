@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ count($asetcount) }}</h3>
                    <p>Total Data Aset</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-box"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ count($pemeliharaan) }}</h3>
                    <p>Total Aset Diperbaiki</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wrench"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ count($asetRusak) }}</h3>
                    <p>Total Aset Rusak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-heart-broken"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ count($disposisi) }}</h3>
                    <p>Total Aset Dimusnahkan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fire-alt"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-0 pt-2 pl-2 pb-0 pr-0">
                    <h5>Aset Masuk Hari ini</h5>
                </div>
                <div class="card-body">


                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Barcode</th>
                                <th>Nama Aset</th>
                                <th>Lokasi Aset</th>
                                <th>Tipe Aset</th>
                                <th>Keterangan</th>
                                <th>Kondisi Aset</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aset as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ QrCode::size(100)->generate(bcrypt($i->id)) }}</td>
                                    <td>{{ $i->nama }}</td>
                                    <td>{{ $i->lokasi->nama }}</td>
                                    <td>{{ $i->tipe_aset->nama }}</td>
                                    <td>{{ $i->keterangan }}</td>
                                    <td>{{ $i->kondisi->nama }}</td>
                                    <td>{{ $i->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@stop


@push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
    </script>
@endpush
