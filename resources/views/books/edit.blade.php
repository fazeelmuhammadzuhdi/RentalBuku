@extends('layout.main')

@section('isi')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Book</h1>
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
                <form action="{{ route('books.update', $books->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="book_code">Code</label>
                        <input type="text" name="book_code" placeholder="Inputkan Kode Buku" id="book_code"
                            class="form-control" required autofocus value="{{ $books->book_code }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Inputkan Judul Buku" id="title"
                            class="form-control" required value="{{ $books->title }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="currentImage" class="form-label" style="display: block">Current Image</label>
                        @if ($books->cover != '')
                            <img src="{{ asset('storage/cover/' . $books->cover) }}" alt="" width="200px">
                        @else
                            <img src="{{ asset('images/3793096.jpg') }}" alt="" width="200px">
                        @endif
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
                    <div class="form-group">
                        <label for="currentCategory">Current Category</label>
                        <ul>
                            @foreach ($books->categories as $currentCategory)
                                <li>{{ $currentCategory->name }}</li>
                            @endforeach
                        </ul>
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
