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
                    @include('staff.maintenance.filters')
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Perbaikan Loker

                    <span class="pull-right">
                        <a href="/staff/maintenance/export?{{ request()->getQueryString() }}">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Export
                        </a>
                    </span>
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No. Perawatan</th>
                            <th>Jenis Perawatan</th>
                            <th>NIM</th>
                            <th>No. Loker</th>
                            <th>Status</th>
                            <th>Tanggal Mulai Perawatan</th>
                            <th>Tanggal Selesai Perawatan</th>
                            <th>opsi</th>
                        </tr>
                        @if(count($maintenances))
        					@foreach($maintenances as $maintenance)
                                <tr>
        							<td>{{ $maintenance->id }}</td>
                                    <td>{{ $maintenance->maintenance_type }}</td>
                                    <td>{{ $maintenance->student_id }}</td>
                                    <td>{{ $maintenance->locker_id }}</td>
                                    <td>{{ $maintenance->status }}</td>
                                    <td>{{ $maintenance->starts_date ?: 'belum terinput' }}</td>
                                    <td>{{ $maintenance->ends_date ?: 'belum terinput' }}</td>
                                    <td>
                                        <a href="/staff/maintenance/{{ $maintenance->id }}">
                                            <i class="fa fa-eye" aria-hidden="true" title="Detail Perawatan"></i>
                                        </a>
                                    </td>
                                </tr>
        					@endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    Tidak ada perawatan loker yang dicari.
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop