<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Pengajuan Permohonan maintenance loker</div>

            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>No. Permohonan</th>
                        <th>NIM</th>
                        <th>No. Sewa</th>
                        <th>No. Loker</th>
                        <th>Jenis Maintenance</th>
                        <th>Tanggal Pengajuan</th>
                        <th></th>
                    </tr>
                    @if(count($unprocessed))
    					@foreach($unprocessed as $submission)
                            <tr>
    							<td>{{ $submission->id }}</td>
    							<td>{{ $submission->student_id }}</td>
    							<td>{{ $submission->sewa_id }}</td>
                                <td>{{ $submission->locker_id }}</td>
                                <td>{{ $submission->maintenance_type }}</td>
                                <td>{{ $submission->created_at }}</td>
                                <td>
                                    <a href="/staff/maintenance/{{ $submission->id }}/create" class="btn-link">
                                        Proses
                                    </a>
                                </td>
                            </tr>
    					@endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                Saat ini, tidak ada permohonan perawatan loker aktif.
                            </td>
                        </tr>
                    @endif
                </table>
                <ul>
				</ul>
            </div>
        </div>
    </div>
</div>