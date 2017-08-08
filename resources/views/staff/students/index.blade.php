@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">

   		<div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Loker

                    <a href="/staff/students/create" class="pull-right">Tambah Mahasiswa</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>email</th>
                        </tr>
                        @if(count($students))
        					@foreach($students as $student)
                                <tr>
        							<td>{{ $student->id }}</td>
        							<td>{{ $student->name }}</td>
                                    <td>{{ $student->program->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-eye" aria-hidden="true" title="Lihat Detail"></i>
                                        </a>
                                    </td>
                                </tr>
        					@endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                	Tidak ada data mahasiswa yang dicari.
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