@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Mahasiswa Baru</div>

                <div class="panel-body">
                    @include('staff.students.form')
                </div>
            </div>
        </div>
    </div>
</div>

@stop