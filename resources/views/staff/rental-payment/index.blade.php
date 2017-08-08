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
                    @include('staff.rental-payment.filters')
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Daftar Pembayaran sewa loker</h4>
                </div>

                <div class="panel-body">
                    <table class="table table-default">
                        <tr>
                            <th>No. Pembayaran</th>
                            <th>No. Sewa</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>aksi</th>
                        </tr>

                    	@foreach($payments as $payment)
                            <tr>
    	                            <td>{{ $payment->id }}</td>
    	                            <td>{{ $payment->sewa_id }}</td>
    	                            <td>{{ $payment->fee }}</td>
                                    <td>{{ $payment->created_at }}</td>
    	                            <td>
                                        <a href="/staff/payment/{{ $payment->id }}">
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