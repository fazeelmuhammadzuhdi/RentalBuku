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
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categories">Category</label>
                        <select name="categories[]" required class="form-control select2" multiple>
                            @foreach ($category as $categories)
                                <option value="{{ $categories->id }}">
                                    {{ $categories->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('after-script')
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2').select2()
        })
    </script>
@endpush
