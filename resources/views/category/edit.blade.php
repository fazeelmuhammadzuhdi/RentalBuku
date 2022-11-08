@extends('layout.main')

@section('judul', 'Tambah Category')

@section('isi')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="#" class="btn btn-sm btn btn-outline-primary" type="button">
                    &laquo; Kembali
                </a>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
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
        <div class="card-body">
            <form action="{{ route('update', $category->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <table style="windows:70%;">
                    <tr>
                        <td>NAME :</td>
                        <td>
                            <input type="text" name="name" id="name" autofocus value="{{ $category->name }}">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <button class="mt-3 btn btn-success" type="submit">
                                Update
                            </button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>

@endsection
