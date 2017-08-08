@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
    	<div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Loker</div>

                <div class="panel-body">
                    <p>No. Sewa : {{ $locker->id }}</p>
                    <p>status : {{ $locker->available ? 'tersedia' : 'tersewa' }}</p>
                    <p>No. Loker : {{ $locker->created_at }}</p>
                </div>
            </div>
        </div>

        <div class="row">
        	<p class="title">
	        	<span>
	        		Riwayat Perawatan Loker
	        	</span>
	        </p>
			
			@forelse($locker->maintenances as $maintenance)
				<div class="row">
					<div class="panel panel-default">
			        	<div class="panel-body">
			        		{{ $maintenance->id }}
			        	</div>
			        </div>
				</div>
			@empty
				<div class="row">
					<div class="panel panel-default">
			        	<div class="panel-body">
			        		Tidak ada data perawatan untuk loker ini!
			        	</div>
			        </div>
				</div>
			@endforelse
	        
        </div>
        
    </div>
</div>

@stop