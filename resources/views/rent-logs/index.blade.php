@extends('layout.main')

@section('judul', 'Halaman Rent Logs')

@section('isi')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><strong>INI HALAMAN Rent Log</strong></h2>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left">
                                    <h5>Data Peminjaman Buku</h5>
                                </div>
                                <div class="float-right">
                                    {{-- <a href="{{ route('tambah-petugas') }}" class="btn btn-info btn-sm">Tambah Data</a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Book</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Batas Waktu Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rent_logs as $i => $data)
                                            <tr
                                                class="{{ $data->actual_return_date == null ? '' : ($data->return_date < $data->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $data->user->username }}</td>
                                                <td>{{ $data->book->title }}</td>
                                                <td>{{ $data->rent_date }}</td>
                                                <td>{{ $data->return_date }}</td>
                                                <td>{{ $data->actual_return_date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
@endsection
