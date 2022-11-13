@extends('layout.main')

@section('isi')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><strong>INI HALAMAN RENTAL BUKU</strong></h2>

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
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <form action="{{ route('rental-book') }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
                            <h1 class="mb-2">Form Pinjam Buku</h1>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <div class="col-4">
                            <select name="user_id" id="user_id" class="form-control inputbox">
                                <option value="" selected disabled>Select User</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="book_id">Book</label>
                        <div class="col-4">
                            <select name="book_id" id="book_id" class="form-control inputbox">
                                <option value="" selected disabled>Book</option>
                                @foreach ($books as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('.inputbox').select2();
        })
    </script>
@endpush
