<form action="/staff/permohonan/{{ $submission->id }}" method="POST">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('rental_submission_id') ? ' has-error' : '' }}">
	    <label for="rental_submission_id" class="col-md-4 control-label">
	    	No. Permohonan :
	    </label>

        <input id="rental_submission_id" type="text" 
        	class="form-control" name="rental_submission_id" 
        	value="{{ $submission->id }}"
        >

        @if ($errors->has('rental_submission_id'))
            <span class="help-block">
                <strong>{{ $errors->first('rental_submission_id') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
	    <label for="student_id" class="col-md-4 control-label">
	    	NIM :
	    </label>

        <input id="student_id" type="text" 
        	class="form-control" name="student_id" 
        	value="{{ $submission->student_id }}"
        >

        @if ($errors->has('student_id'))
            <span class="help-block">
                <strong>{{ $errors->first('student_id') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('locker_id') ? ' has-error' : '' }}">
	    <label for="locker_id" class="col-md-4 control-label">
	    	No. Loker :
	    </label>

        <select name="locker_id" id="locker_id" class="form-control">
        	<option value="">pilih loker</option>
        	@foreach($lockers as $locker)
				<option value="{{ $locker->id }}">{{ $locker->id }}</option>
        	@endforeach
        </select>

        @if ($errors->has('locker_id'))
            <span class="help-block">
                <strong>{{ $errors->first('locker_id') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group">
		<button class="btn btn-info" type="submit">Submit</button>
	</div>
</form>