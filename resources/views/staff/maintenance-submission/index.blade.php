@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-default">
	            <div class="panel-heading">Daftar Pengajuan Permohonan maintenance loker</div>

	            <div class="panel-body">
	                <table class="table table-striped">
	                    <tr>
	                        <th>No. Permohonan</th>
	                        <th>NIM</th>
	                        <th>No. Sewa</th>
	                        <th>No. Loker</th>
	                        <th>Jenis Maintenance</th>
	                        <th>Tanggal Pengajuan</th>
	                        <th>opsi</th>
	                    </tr>
	                    @if(count($submissions))
	    					@foreach($submissions as $submission)
	                            <tr>
	    							<td>{{ $submission->id }}</td>
	    							<td>{{ $submission->student_id }}</td>
	    							<td>{{ $submission->sewa_id }}</td>
	                                <td>{{ $submission->locker_id }}</td>
	                                <td>{{ $submission->maintenance_type }}</td>
	                                <td>{{ $submission->created_at }}</td>
	                                <td>
	                                	@if(! $submission->approved)
											<a href="/staff/maintenance/{{ $submission->id }}/create" class="btn-link">
		                                        Proses
		                                    </a>
	                                	@else
											<a href="#">
												<i title="Lihat Detail Permohonan" class="glyphicon glyphicon-eye-open" aria-hidden="true"></i>
											</a>
	                                	@endif
	                                </td>
	                            </tr>
	    					@endforeach
	                    @else
	                        <tr>
	                            <td colspan="4">
	                                Saat ini, tidak ada permohonan perawatan loker aktif.
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