@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Pengajuan Perawatan Loker</div>

                <div class="panel-body">
                    <form action="/permohonan-maintenance/{{ $sewa->id }}" method="POST">
                    	{{ csrf_field() }}
                        
                        {{-- this field is just for temporary before we creating student authorization guard --}}
                        <input type=hidden name=student_id value="{{ $sewa->student_id }}">

                    	<div class="form-group{{ $errors->has('sewa_id') ? ' has-error' : '' }}">
                    	    <label for="sewa_id">No. Sewa :</label>
                    	
                	        <input id="sewa_id" type="text" 
                	        	class="form-control" name="sewa_id" 
                	        	value="{{ $sewa->id ?: old('sewa_id') }}"
                	        	placeholder="isikan alamat anda" 
                	        >
                	
                	        @if ($errors->has('sewa_id'))
                	            <span class="help-block">
                	                <strong>{{ $errors->first('sewa_id') }}</strong>
                	            </span>
                	        @endif
                    	</div>

                    	<div class="form-group{{ $errors->has('locker_id') ? ' has-error' : '' }}">
                    	    <label for="locker_id">No. Loker :</label>
                    	
                	        <input id="locker_id" type="text" 
                	        	class="form-control" name="locker_id" 
                	        	value="{{ old('locker_id') ?: $sewa->locker_id }}"
                	        	placeholder="isikan No. Loker anda" 
                	        >
                	
                	        @if ($errors->has('locker_id'))
                	            <span class="help-block">
                	                <strong>{{ $errors->first('locker_id') }}</strong>
                	            </span>
                	        @endif
                    	</div>


                    	<div class="form-group{{ $errors->has('maintenance_type') ? ' has-error' : '' }}">
                    	    <label for="maintenance_type">Jenis Perawatan :</label>
                    	
                	        <select name="maintenance_type" id="maintenance_type" class="form-control">
                	        	<option value="">pilih jenis perawatan loker</option>
                	        	<option value="ganti kunci">ganti kunci</option>
                	        	<option value="kerusakan loker">kerusakan loker</option>
                	        </select>
                	
                	        @if ($errors->has('maintenance_type'))
                	            <span class="help-block">
                	                <strong>{{ $errors->first('maintenance_type') }}</strong>
                	            </span>
                	        @endif
                    	</div>

                    	<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    	    <label for="description">Keterangan :</label>
                    	
                	        <input id="description" type="text" 
                	        	class="form-control" name="description" 
                	        	value="{{ old('description') }}"
                	        	placeholder="diharapkan untuk mengisikan keterangan bila loker rusak (tidak wajib)" 
                	        >
                	
                	        @if ($errors->has('description'))
                	            <span class="help-block">
                	                <strong>{{ $errors->first('description') }}</strong>
                	            </span>
                	        @endif
                    	</div>

                    	<div class="form-group">
                    		<button class="btn btn-info" type="submit">Ajukan</button>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop