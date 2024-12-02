@extends('adminlte::page')

@section('title', 'Pemindahan Aset')

@section('content_header')
    <h1 class="m-0 text-dark">Pemindahan Aset</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header m-0 pt-2 pl-2 pb-0 pr-0">
                    <a href="{{ route('pemindahans.create') }}" class="btn btn-primary mb-2">
                        Pemindahan
                    </a>
                </div>
                <div class="card-body">


                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Aset</th>
                                <th>Lokasi Aset</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $i)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $i->nama }}</td>
                                    <td>{{ $i->lokasi->nama }}</td>
                                    <td>
                                        <a href="{{ route('pemindahans.edit', $i) }}" class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i>
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
    </script>
@endpush
