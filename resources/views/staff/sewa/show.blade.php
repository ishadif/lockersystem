@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Sewa Loker</div>

                <div class="panel-body">

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list"></span>
                        </div>
                        <p class="detail-title">
                            No. Sewa :
                        </p>
                        <p class="detail-item">
                            {{ $rental->id }}
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
                            {{ $rental->student_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <p class="detail-title">
                            No. Loker :
                        </p>
                        <p class="detail-item">
                            {{ $rental->locker_id }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <p class="detail-title">
                            Status :
                        </p>
                        <p class="detail-item">
                            {{ $rental->status }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <p class="detail-title">
                            Tanggal Mulai :
                        </p>
                        <p class="detail-item">
                            {{ $rental->starts_date ?: 'Belum Terinput' }}
                        </p>
                    </div>

                    <div class="detail">
                        <div class="detail-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <p class="detail-title">
                            Tanggal selesai :
                        </p>
                        <p class="detail-item">
                            {{ $rental->ends_date ?: 'Belum Terinput' }}
                        </p>
                    </div>

                    @if($rental->status == 'pengambilan kunci')
						<form action="/staff/sewa/{{ $rental->id }}/activate" method="POST">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}

							<button class="btn btn-info" type="submit">Aktifkan</button>
						</form>
                    @endif

                    @if($rental->status == 'berjalan')
                        <form action="/staff/sewa/{{ $rental->id }}/finish" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <button class="btn btn-info btn-block" type="submit">Selesai</button>
                            </div>
                        </form>
                    @endif

                    <a class="btn btn-link" href="/staff/sewa">&larr; kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop