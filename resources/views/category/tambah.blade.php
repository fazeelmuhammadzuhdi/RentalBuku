@extends('layout.main')

@section('judul', 'Tambah Category')

@section('isi')

    <div class="container mb-4">

        <a href="{{ route('categories') }}" class="btn btn-sm btn-warning">
            <i class="fa fa-undo-alt"> </i> Kembali
        </a>
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

    <form action="{{ route('simpan') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row mb-3">
                <label for="name" class="col-sm-4 col-form-label">Nama Barang</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Name"
                        value="{{ old('name') }}" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-4 col-form-label"></label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>

    </form>

@endsection
