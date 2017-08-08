@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @include('student.rental-submission.filters')                    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Pengajuan sewa

                        <span class="pull-right">
                            <a href="/permohonan/create" class="btn btn-link">Buat Permohonan</a>
                        </span>
                    </div>

                    <div class="panel-body">
                        @include('student.maintenance-submission.submissions')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection