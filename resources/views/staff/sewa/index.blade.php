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
                    @include('staff.sewa.filters')
                </div>
            </div>
        </div>

        <div class="col-md-8">

            <div class="row">
                @include('staff.sewa.rentals')
            </div>

        </div>
    </div>
</div>
@stop