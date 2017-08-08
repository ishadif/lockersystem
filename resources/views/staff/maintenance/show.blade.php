@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<p>
                		Detail Perawatan Loker
                		<button class="btn btn-default pull-right">{{ $maintenance->status }}</button>
                	</p>
                </div>

                <div class="panel-body">
                    <p>No. Perawatan : {{ $maintenance->id }}</p>
                    <p>No. Permohonan Perawatan : {{ $maintenance->maintenances_submission_id }}</p>
                    <p>Jenis Perawatan : {{ $maintenance->maintenance_type }}</p>
                    <p>NIM : {{ $maintenance->student_id }}</p>
                    <p>No. Loker : {{ $maintenance->locker_id }}</p>
                    <p>Tanggal Mulai : {{ $maintenance->starts_date ?: 'Belum Terinput' }}</p>
                    <p>Tanggal Selesai : {{ $maintenance->ends_date ?: 'Belum Terinput' }}</p>

	                @if($maintenance->status === 'berjalan')
	                	<form action="/staff/maintenance/{{ $maintenance->id }}" method="POST">
	                		{{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            
	                		<button class="btn btn-info btn-block" type="submit">Selesai</button>
	                	</form>
	                @endif
                </div>

            </div>
        </div>
    </div>
</div>

@stop