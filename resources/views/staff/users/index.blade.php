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
                    @include('staff.users.filters')
                </div>
            </div>
        </div>

        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Staff Sistem Loker

                    <span class="pull-right">
                        <a href="/staff/register" class="btn btn-link">Buat Staff Baru</a>
                    </span>
                </div>

                <div class="panel-body">
                	<table class="table table-striped">
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Email</th>
                            <th>Tanggal Input</th>
                            <th colspan="2">opsi</th>
                        </tr>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->roles->first()->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                               <td colspan="7">
                                    tidak ada data staff yang dicari
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