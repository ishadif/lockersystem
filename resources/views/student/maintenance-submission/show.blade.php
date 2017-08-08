@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>
                        Detail Permohonan Perawatan Loker
                        
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
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <p class="detail-title">
                            No. Sewa
                        </p>
                        <p class="detail-item">
                            {{ $submission->sewa_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <p class="detail-title">
                            No. Loker
                        </p>
                        <p class="detail-item">
                            {{ $submission->locker_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <p class="detail-title">
                            Jenis Perawatan
                        </p>
                        <p class="detail-item">
                            {{ $submission->maintenance_type }}
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

                    <a class="btn btn-link" href="/permohonan-maintenance">&larr; kembali</a>
                </div>
            </div>
        </div>

    </div>
</div>

@stop