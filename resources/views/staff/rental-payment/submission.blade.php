@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Daftar Pengajuan Pembayaran Sewa Loker</h4>
                </div>

                <div class="panel-body">
                
                    <form action="/staff/payment-submission" class="form-inline mb-1">
                        <div class="form-group">
                            <input type="text" name="id" class="form-control" placeholder="cari nomor perawatan">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>

                        <div class="form-group">
                            <a href="/staff/payment/submission">Reset</a>
                        </div>
                    </form>

                    <table class="table table-default">
                        <tr>
                            <th>No. Perawatan</th>
                            <th>NIM</th>
                            <th>aksi</th>
                        </tr>
                        @if(count($rentals))
                            @foreach($rentals as $rental)
                            <tr>
                                <td>{{ $rental->id }}</td>
                                <td>{{ $rental->student_id }}</td>
                                <td>
                                	<a href="/staff/payment/{{ $rental->id }}/create">
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