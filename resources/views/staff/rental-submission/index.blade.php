@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Pengajuan sewa loker</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No. Permohonan</th>
                            <th>NIM</th>
                            <th>Tanggal Pengajuan</th>
                            <th>opsi</th>
                        </tr>
                        @if(count($submissions))
        					@foreach($submissions as $submission)
                                <tr>
        							<td>{{ $submission->id }}</td>
        							<td>{{ $submission->student_id }}</td>
                                    <td>{{ $submission->created_at }}</td>
                                    <td>
                                        @if(! $submission->approved)
                                            @can('create_sewa')
                                                <a href="/staff/permohonan/{{ $submission->id }}/create">
                                                    proses
                                                </a>
                                            @endcan
                                        @endif
                                    </td>
                                </tr>
        					@endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                Tidak ada permohonan sewa.
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
</div>


@stop