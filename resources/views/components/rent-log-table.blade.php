<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h5>Data Peminjaman Buku </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Book</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Batas Waktu Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentlog as $i => $data)
                                    <tr
                                        class="{{ $data->actual_return_date == null ? '' : ($data->return_date < $data->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $data->user->username }}</td>
                                        <td>{{ $data->book->title }}</td>
                                        <td>{{ $data->rent_date }}</td>
                                        <td>{{ $data->return_date }}</td>
                                        <td>{{ $data->actual_return_date }}</td>
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
