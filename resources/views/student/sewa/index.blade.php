@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        @if($submission)
            <div class="row">
                <div class="alert alert-warning">
                    <p>
                        Saat ini anda memiliki permohonan penyewaan loker yang belum disetujui dan diajukan pada tanggal 
                        <strong>{{ $submission->created_at }}</strong>. informasi lebih lanjut lihat 
                        <a href="/permohonan/{{ $submission->id }}">di sini</a>
                    </p>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="panel panel-default full-height">
                <div class="panel-heading">Daftar Sewa Loker Anda</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No. Sewa</th>
                            <th>No. Loker</th>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th colspan="2">opsi</th>
                        </tr>
                        @if(count($rentals))
        					@foreach($rentals as $rental)
                                <tr>
        							<td>{{ $rental->id }}</td>
        							<td>{{ $rental->locker_id }}</td>
                                    <td>{{ $rental->status }}</td>
                                    <td>{{ $rental->starts_date ?: 'belum terinput' }}</td>
                                    <td>{{ $rental->ends_date ?: 'belum terinput' }}</td>
                                    <td>
                                        <a href="/sewa/{{ $rental->id }}">
                                            <i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    @if($rental->status == 'berjalan')
                                        <td>
                                            <a href="/permohonan-maintenance/{{ $rental->id }}/create">
                                                <i class="glyphicon glyphicon-wrench" aria-hidden="true" title="maintenance loker"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
        					@endforeach
                        @else
                            <tr>
                                @if(! $submission)
                                    <td colspan="6">
                                        Tidak ada permohonan sewa. silahkan ajukan <a href="/permohonan/create">di sini</a>
                                    </td>
                                @else
                                    <td colspan="6">Anda belum memiliki penyewaan loker</td>
                                @endif
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@stop