@extends('layout.main')

@section('isi')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><strong>INI HALAMAN REGISTRASI USERS</strong></h2>

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
                                    <h3>New Registrasi</h3>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('users') }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-hand-paper"></i> Approved User</a>
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
                                        @foreach ($register as $i => $registers)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>

                                                <td>{{ $registers->username }}</td>
                                                <td>
                                                    @if ($registers->phone)
                                                        {{ $registers->phone }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('user-details', $registers->slug) }}"
                                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
                                                        Detail</a>

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
