@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

        <div class="col-md-4">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3>Filters</h3>
                </div>

                <div class="panel-body">
                    @include('staff.maintenance-payment.filters')
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Daftar Pembayaran perawatan loker</h4>
                </div>

                <div class="panel-body">
                    <table class="table table-default">
                        <tr>
                            <th>No. Pembayaran</th>
                            <th>No. Perawatan</th>
                            <th>jenis perawatan</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>aksi</th>
                        </tr>

                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->maintenance_id }}</td>
                                <td>{{ $payment->maintenance->maintenance_type }}</td>
                                <td>{{ $payment->fee }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>
                                    <a href="/staff/maintenance-payments/{{ $payment->id }}">
                                        <span class="glyphicon glyphicon-eye-open" title="lihat detil pembayaran"></span>
                                    </a>   
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>

@stop