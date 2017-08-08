@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-8 col-md-offset-2">

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Profil Anda</div>

                <div class="panel-body">

                    @include('staff.profile.update-form')

                    <hr>

                    @include('staff.profile.update-password')
                    
                </div>
            </div>
        </div>
    </div>
</div>

@stop