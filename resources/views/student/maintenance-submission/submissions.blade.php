<table class="table table-striped">
    <tr>
        <th>No. Permohonan</th>
        <th>status</th>
        <th>Tanggal terproses</th>
        <th>Tanggal Pengajuan</th>
        <th>opsi</th>
    </tr>
    @if(count($submissions))
        @foreach($submissions as $submission)
            <tr>
                <td><a href="{{ $submission->path() }}">{{ $submission->id }}</a></td>
                <td>{{ $submission->approved ? 'disetujui' : 'belum disetujui' }}</td>
                <td>{{ $submission->processed_at ?: 'belum terinput' }}</td>
                <td>{{ $submission->created_at }}</td>
                <td>
                    <a href="/permohonan/{{ $submission->id }}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4">
                Tidak ada permohonan sewa loker atau data yang dicari tidak ada
            </td>
        </tr>
    @endif
</table>