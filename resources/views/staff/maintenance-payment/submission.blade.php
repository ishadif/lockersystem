@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Daftar Pembayaran Perawatan Loker</h4>
                </div>

                <div class="panel-body">
                	<form action="/staff/maintenance-payments/submission" class="form-inline mb-1">
                		<div class="form-group">
                			<input type="text" name="id" class="form-control" placeholder="cari nomor perawatan">
                		</div>

                		<div class="form-group">
                			<button type="submit" class="btn btn-info">Cari</button>
                		</div>

                		<div class="form-group">
                			<a href="/staff/maintenance-payments/submission">Reset</a>
                		</div>
                	</form>

                    <table class="table table-default">
                        <tr>
                            <th>No. Perawatan</th>
                            <th>NIM</th>
                            <th>Jenis Perawatan</th>
                            <th>aksi</th>
                        </tr>
                        @if(count($maintenances))
                            @foreach($maintenances as $maintenance)
                            <tr>
                                <td>{{ $maintenance->id }}</td>
                                <td>{{ $maintenance->student_id }}</td>
                                <td>{{ $maintenance->maintenance_type }}</td>
                                <td>
                                	<a href="/staff/maintenance/{{ $maintenance->id }}/payment/create">
                                		<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                        proses
                                	</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Belum ada pengajuan pembayaran sewa loker baru</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>

@stop