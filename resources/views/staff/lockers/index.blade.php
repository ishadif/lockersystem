@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">

    	<div class="row">
    		<div class="panel panel-default">
    			<div class="panel-body">
    				<h4>
    					<strong>{{ $total }}</strong> Jumlah loker tersedia saat ini
    				</h4>
    			</div>
    		</div>
    	</div>

   		<div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Loker</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No. Loker</th>
                            <th>status</th>
                            <th>Tanggal Input</th>
                            <th>opsi</th>
                        </tr>
                        @if(count($lockers))
        					@foreach($lockers as $locker)
                                <tr>
        							<td>{{ $locker->id }}</td>
        							<td>{{ $locker->available ? 'tersedia' : 'tersewa' }}</td>
                                    <td>{{ $locker->created_at }}</td>
                                    <td>
                                        <a href="/staff/lockers/{{ $locker->id }}">
                                            <i class="fa fa-eye" aria-hidden="true" title="Lihat Detail"></i>
                                        </a>
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