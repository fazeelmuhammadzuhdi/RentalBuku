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
            <x-rent-log-table :rentlog='$rent_logs' />
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
@endsection
