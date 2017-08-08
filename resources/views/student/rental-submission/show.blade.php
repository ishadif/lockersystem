@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                        Detail Permohonan Sewa Loker
                        
                        <span class="btn btn-default pull-right">
                            {{ $submission->approved ? 'Disetujui' : 'Belum Disetujui' }}
                        </span>
                    </p>
                </div>

                <div class="panel-body">
                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list"></span>
                        </div>
                        <p class="detail-title">
                            No. Permohonan :
                        </p>
                        <p class="detail-item">
                            {{ $submission->id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <p class="detail-title">
                            NIM
                        </p>
                        <p class="detail-item">
                            {{ $submission->student_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <p class="detail-title">
                            Tanggal Proses
                        </p>
                        <p class="detail-item">
                            {{ $submission->processed_at ?: 'Belum terinput' }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <p class="detail-title">
                            Tanggal Pengajuan
                        </p>
                        <p class="detail-item">
                            {{ $submission->created_at }}
                        </p>
                    </div>

                    <a class="btn btn-link" href="/permohonan">&larr; kembali</a>
                </div>
            </div>
        </div>

        @if(count($rental))

            @if($rental->status == 'pembayaran')
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-danger" role="alert">
                        Silahkan lakukan pembayaran ke Bagian Keuangan agar penyewaan dapat segera dimulai.
                        informasi penyewaan loker dapat dilihat <a href="/sewa">di sini</a>
                    </div>
                </div>
            @else
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Penyewaan Loker</h4>
                        </div>

                        <div class="panel-body">
                            <table class="table table-default">
                                <tr>
                                    <th>No. sewa</th>
                                    <th>No. Permohonan Sewa</th>
                                    <th>Status</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                </tr>

                                <tr>
                                    <td>{{ $rental->id }}</td>
                                    <td>{{ $rental->rental_submission_id }}</td>
                                    <td>{{ $rental->status }}</td>
                                    <td>{{ $rental->starts_date ?: 'Belum terinput' }}</td>
                                    <td>{{ $rental->ends_date ?: 'Belum terinput' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>        
            @endif
        @endif

    </div>
</div>


@stop