@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Pembayaran Perawatan Loker</div>

                <div class="panel-body">

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list"></span>
                        </div>
                        <p class="detail-title">
                            No. Pembayaran :
                        </p>
                        <p class="detail-item">
                            {{ $payment->id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list"></span>
                        </div>
                        <p class="detail-title">
                            No. Sewa :
                        </p>
                        <p class="detail-item">
                            {{ $payment->sewa_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <p class="detail-title">
                            NIM :
                        </p>
                        <p class="detail-item">
                            {{ $payment->rental->student_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <p class="detail-title">
                            Jumlah Pembayaran :
                        </p>
                        <p class="detail-item">
                            {{ $payment->fee }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <p class="detail-title">
                            Tanggal Pembayaran :
                        </p>
                        <p class="detail-item">
                            {{ $payment->created_at }}
                        </p>
                    </div>

                    <a class="btn btn-link" href="/staff/payment">&larr; kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop