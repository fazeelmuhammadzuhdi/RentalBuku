@extends('layout.main')

@section('judul', 'Halaman Book')

@section('isi')

    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><strong>INI HALAMAN BOOKS</strong></h2>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="container mt-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Books</h1>
                <a href="{{ route('books.tambah') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white"></i> Tambah Gallery
                </a>
            </div>
        </div>

        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30">NO</th>
                                <th>CODE</th>
                                <th>TITLE</th>
                                <th>STATUS</th>
                                <th width="20%">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->book_code }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->status }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"> Edit</i>
                                        </a>
                                        <form action="#" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
