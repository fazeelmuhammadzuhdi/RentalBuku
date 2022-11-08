@extends('layout.main')

@section('judul', 'Halaman Category')

@section('isi')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><strong>INI HALAMAN CATEGORY</strong></h2>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>


        <div class="container mt-3">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <a href="{{ route('tambah') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"> </i> Tambah Data
            </a>


            <div class="mt-4">
                <table class="table table-responsive-sm table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Name</th>
                            <th style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $categories)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $categories->name }}</td>
                                <td>

                                    <a href="{{ route('edit', $categories->slug) }}" class="btn btn-sm btn-warning"><i
                                            class="fas fa-edit"></i>Edit</a>

                                    <form action="{{ route('hapus', $categories->id) }}" method="POST"
                                        style="display: inline; margin-left: 12px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data ">
                                            <i class="fa fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
