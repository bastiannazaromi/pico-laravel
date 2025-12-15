@extends('layouts.app')

@section('title', 'Data Suhu & Kelembapan')

@section('content')
    <div class="mb-3">
        <h4>Control Relay</h4>

        <button id="relayBtn" class="btn btn-secondary">
            Loading...
        </button>
    </div>

    <h2>Data Suhu & Kelembapan</h2>

    <table id="sensorTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Suhu (°C)</th>
                <th>Kelembapan (%)</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $i => $item)
                <tr id="row-{{ $item->id }}">
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->temperature }}</td>
                    <td>{{ $item->humidity }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $item->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#sensorTable').DataTable();

            $('.deleteBtn').on('click', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data ini tidak bisa dikembalikan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '/sensor/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {

                                if (response.status) {
                                    $('#row-' + id).remove();

                                    Swal.fire(
                                        'Berhasil!',
                                        'Data telah dihapus.',
                                        'success'
                                    );
                                }
                            }
                        });

                    }
                });
            });

            function loadRelayStatus() {
                $.get('/relay/status', function(res) {
                    if (res && res.status == 1) {
                        $('#relayBtn').removeClass('btn-danger').addClass('btn-success').text('Relay ON');
                        $('#relayBtn').data('status', 1);
                    } else {
                        $('#relayBtn').removeClass('btn-success').addClass('btn-danger').text('Relay OFF');
                        $('#relayBtn').data('status', 0);
                    }
                });
            }

            $('#relayBtn').on('click', function() {
                let status = $(this).data('status') == 1 ? 0 : 1;

                $.post('/relay/update', {
                    _token: '{{ csrf_token() }}',
                    status: status
                }, function(res) {
                    if (res.status) {
                        loadRelayStatus();
                        Swal.fire('Berhasil!', 'Relay berhasil diubah', 'success');
                    }
                });
            });

            loadRelayStatus();
        });
    </script>
@endsection
