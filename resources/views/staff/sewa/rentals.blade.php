<div class="panel panel-default">
    <div class="panel-heading">
        Daftar Penyewaan loker

        <span class="pull-right">
            <a href="/staff/sewa/export?{{ request()->getQueryString() }}">
                <i class="fa fa-download" aria-hidden="true"></i>
                Export
            </a>
        </span>
    </div>

    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <th>No. Sewa</th>
                <th>NIM</th>
                <th>No. Loker</th>
                <th>Status</th>
                <th>Tanggal Input</th>
                <th></th>
            </tr>
            @if(count($rentals))
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->id }}</td>
                        <td>{{ $rental->student_id }}</td>
                        <td>{{ $rental->locker_id }}</td>
                        <td>{{ $rental->status }}</td>
                        <td>{{ $rental->created_at }}</td>
                        <td>
                            <a href="/staff/sewa/{{ $rental->id }}">
                                <i class="fa fa-eye" aria-hidden="true" title="Lihat Detail"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Tidak ada data yang dicari</td>
                </tr>
            @endif
        </table>
    </div>
</div>