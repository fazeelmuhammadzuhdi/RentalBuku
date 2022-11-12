@extends('layout.main')


@section('isi')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><strong>INI HALAMAN USERS</strong></h2>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left">
                                    <h5>Data Anggota</h5>
                                </div>
                                <div class="float-right">
                                    <a href="#" class="btn btn-secondary btn-sm">View Deleted Data</a>
                                    <a href="{{ route('register.users') }}" class="btn btn-info btn-sm">Registrasi User</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th width="20%">No</th>
                                            <th>Username</th>
                                            <th>No Hp</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $i => $users)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>

                                                <td>{{ $users->username }}</td>
                                                <td>
                                                    @if ($users->phone)
                                                        {{ $users->phone }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="#" class="btn btn-sm btn-warning"><i
                                                            class="fas fa-edit"></i> Detail</a>
                                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash">
                                                            Ban User</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('after-script')
    <script>
        $(function() {
            $('#table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
