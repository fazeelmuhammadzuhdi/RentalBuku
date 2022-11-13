@extends('v_public.book-include')

@section('isi')
    <form action="" method="get">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <select name="category" id="category" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Cari Data">
                        <button class="btn btn-primary ml-3" type="submit"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="my-2">
        <div class="container">
            <div class="row">
                @foreach ($book as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6-mb-3">
                        <div class="card">
                            <img src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('images/3793096.jpg') }}"
                                class="card-img-top" draggable="false" height="280px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->book_code }}</h5>
                                <p class="card-text">{{ $item->title }}</p>
                                <p
                                    class="card-text text-right font-weight-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                    {{ $item->status }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
