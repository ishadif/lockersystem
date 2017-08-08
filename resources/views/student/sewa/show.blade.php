@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

    	@if($sewa->status == 'pembayaran')
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-danger" role="alert">
                    Silahkan lakukan pembayaran ke Bagian Keuangan agar penyewaan dapat segera dimulai.
                </div>
            </div>    
        @endif

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                        Detail Sewa Loker
                        
                        <span class="btn btn-default pull-right">
                            {{ $sewa->status }}

                        </span>
                    </p>
                </div>

                <div class="panel-body">
                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list"></span>
                        </div>
                        <p class="detail-title">
                            No. Sewa :
                        </p>
                        <p class="detail-item">
                            {{ $sewa->id }}
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
                            {{ $sewa->student_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <p class="detail-title">
                            Tanggal Mulai
                        </p>
                        <p class="detail-item">
                            {{ $sewa->starts_date ?: 'Belum terinput' }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <p class="detail-title">
                            Tanggal Selesai
                        </p>
                        <p class="detail-item">
                            {{ $sewa->ends_date ?: 'Belum terinput' }}
                        </p>
                    </div>

                    @if($sewa->status == 'pembayaran')
                        <a class="btn btn-info btn-block" href="/permohonan-maintenance/{{ $sewa->id }}/create">
                            Buat Permohonan Maintenance
                        </a>
                    @endif
                    <a class="btn btn-link" href="/sewa">&larr; kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop