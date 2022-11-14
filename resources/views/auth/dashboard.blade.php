@extends('layout.main')

@section('judul', 'Halaman Dashboard')

@section('isi')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><strong>SELAMAT DATANG , {{ Auth::user()->username }}</strong></h2>

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
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Books</h3>
                            <p><strong>{{ $book }}</strong></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Categories</h3>

                            <p><strong>{{ $category }}</strong></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Users</h3>
                            <p><strong>{{ $user }}</strong></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-header">
            <h1 class="card-title"><b>Rent Log</b></h1>
        </div>

        <div class="card-body">
            <x-rent-log-table :rentlog='$rent_logs' />
        </div>
        <!-- /.card-footer-->
    </div>
@endsection
