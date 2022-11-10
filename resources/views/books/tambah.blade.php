@extends('layout.main')

@section('isi')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('books.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="book_code">Code</label>
                        <input type="text" name="book_code" placeholder="Inputkan Kode Buku" id="book_code"
                            class="form-control" required autofocus value="{{ old('book_code') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Inputkan Judul Buku" id="title"
                            class="form-control" required value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="cover">Image</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
