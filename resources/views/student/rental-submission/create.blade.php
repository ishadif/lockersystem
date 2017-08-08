@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Pengajuan Sewa Loker</div>

                <div class="panel-body">
                	<p class="text-center" style="border: 1px solid #d2cfcf; padding: 20px;">
                		Informasi akun anda akan diperbarui secara otomatis ketika anda mengajukan permohonan penyewaan loker
                	</p>
                    <form action="/permohonan" method="POST">
                    	{{ csrf_field() }}
                        
                        {{-- this field is just for temporary before we creating student authorization guard --}}
                        <input type=hidden name=student_id value="{{ $student->id }}">

                    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    	    <label for="email">email :</label>
                    	
                	        <input id="email" type="text" 
                	        	class="form-control" name="email" 
                	        	value="{{ old('email') ?: $student->email }}"
                	        	placeholder="isikan email anda" 
                	        >
                	
                	        @if ($errors->has('email'))
                	            <span class="help-block">
                	                <strong>{{ $errors->first('email') }}</strong>
                	            </span>
                	        @endif
                    	</div>

                    	<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    	    <label for="address">alamat :</label>
                    	
                	        <input id="address" type="text" 
                	        	class="form-control" name="address" 
                	        	value="{{ $student->address ?: old('address') }}"
                	        	placeholder="isikan alamat anda" 
                	        >
                	
                	        @if ($errors->has('address'))
                	            <span class="help-block">
                	                <strong>{{ $errors->first('address') }}</strong>
                	            </span>
                	        @endif
                    	</div>

                    	<div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                    	    <label for="telephone">telephone :</label>
                    	
                	        <input id="telephone" type="text" 
                	        	class="form-control" name="telephone" 
                	        	value="{{ $student->telephone ?: old('telephone') }}"
                	        	placeholder="isikan telephone anda" 
                	        >
                	
                	        @if ($errors->has('telephone'))
                	            <span class="help-block">
                	                <strong>{{ $errors->first('telephone') }}</strong>
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