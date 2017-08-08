@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Form Penyewaan Loker</div>

                <div class="panel-body">
                    @include('staff.maintenance.form')
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Permohonan Maintenance</div>

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
                            NIM :
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
                            Jenis Perawatan :
                        </p>
                        <p class="detail-item">
                            {{ $submission->maintenance_type ?: 'Belum terinput' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@stop