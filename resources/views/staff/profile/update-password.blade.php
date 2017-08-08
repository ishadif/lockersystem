<div class="col-md-8 col-md-offset-2">
    <h3 class="title">Perbarui Password</h3>
</div>

<form class="form-horizontal" action="/staff/profile/password/reset" method="POST">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
	    <label for="old_password" class="col-md-4 control-label">
	    	Password Lama
	    </label>
	
	    <div class="col-md-6">
	        <input id="old_password" type="password" class="form-control" name="old_password" value="{{ old('old_password') }}">
	
	        @if ($errors->has('old_password'))
	            <span class="help-block">
	                <strong>{{ $errors->first('old_password') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	    <label for="password" class="col-md-4 control-label">Password Baru</label>
	
	    <div class="col-md-6">
	        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
	
	        @if ($errors->has('password'))
	            <span class="help-block">
	                <strong>{{ $errors->first('password') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	    <label for="password_confirmation" class="col-md-4 control-label">
	    	Ulangi Password
	    </label>
	
	    <div class="col-md-6">
	        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
	
	        @if ($errors->has('password_confirmation'))
	            <span class="help-block">
	                <strong>{{ $errors->first('password_confirmation') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
		<button class="btn btn-info" type="submit">Submit</button>
			
		</div>
	</div>
</form>