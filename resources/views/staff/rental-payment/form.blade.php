<form action="/staff/sewa/{{ $rental->id }}/payment" method="POST">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('sewa_id') ? ' has-error' : '' }}">
	    <label for="sewa_id" class="col-md-4 control-label">
	    	No. Sewa :
	    </label>

        <input id="sewa_id" type="text" 
        	class="form-control" name="sewa_id" 
        	value="{{ $rental->id }}"
        >

        @if ($errors->has('sewa_id'))
            <span class="help-block">
                <strong>{{ $errors->first('sewa_id') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
	    <label for="student_id" class="col-md-4 control-label">
	    	NIM :
	    </label>

        <input id="student_id" type="text" 
        	class="form-control" name="student_id" 
        	value="{{ $rental->student_id }}"
        >

        @if ($errors->has('student_id'))
            <span class="help-block">
                <strong>{{ $errors->first('student_id') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('fee') ? ' has-error' : '' }}">
	    <label for="fee" class="col-md-4 control-label">
	    	Biaya Sewa :
	    </label>

        <input id="fee" type="text" 
            class="form-control" name="fee" 
            value="{{ $rental->fee }}"
        >

        @if ($errors->has('fee'))
            <span class="help-block">
                <strong>{{ $errors->first('fee') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group">
		<button class="btn btn-info" type="submit">Submit</button>
	</div>
</form>