@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="row">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @include('student.maintenance-submission.filters')                    
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Pengajuan Perawatan Loker</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No. Permohonan</th>
                                <th>Status</th>
                                <th>Tanggal Proses</th>
                                <th>Tanggal Pengajuan</th>
                                <th>opsi</th>
                            </tr>
                            @if(count($submissions))
                                @foreach($submissions as $submission)
                                    <tr>
                                        <td>{{ $submission->id }}</td>
                                        <td>
                                            {{ $submission->approved ? 'disetujui' : 'belum disetujui' }}
                                        </td>
                                        <td>{{ $submission->processed_at ?: 'belum terinput' }}</td>
                                        <td>{{ $submission->created_at }}</td>
                                        <td>
                                            <a href="/permohonan-maintenance/{{ $submission->id }}">
                                                <i title="Lihat Detail Permohonan" class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        Tidak ada permohonan perawatan loker yang dicari.
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@stop