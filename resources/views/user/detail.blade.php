@extends('layout.main')


@section('isi')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h5>Detail Data User</h5>
                        </div>
                    </div>


                    <div class="mt-2 d-flex justify-content-center">
                        @if ($user->status == 'inactive')
                            <a href="{{ route('user-approve', $user->slug) }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-hand-rock"></i>
                                Approve User</a>
                        @else
                            <a href="{{ route('users') }}" class="btn btn-info btn-sm"><i class="fas fa-backward"></i>
                                Kembali</a>
                        @endif

                    </div>

                    <div class="container mt-3">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                                    readonly autofocus>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No Handphone</label>
                                @if ($user->phone)
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"
                                        readonly>
                                @else
                                    <input type="text" name="phone" value="-" class="form-control" readonly>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="address" class="form-control" rows="3" readonly>{{ $user->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="status" value="{{ $user->status }}" class="form-control"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
