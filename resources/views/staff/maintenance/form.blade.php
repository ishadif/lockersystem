<form action="/staff/maintenance/{{ $submission->id }}" method="POST">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('maintenances_submission_id') ? ' has-error' : '' }}">
	    <label for="maintenances_submission_id" class="col-md-4 control-label">
	    	No. Permohonan :
	    </label>

        <input id="maintenances_submission_id" type="text" 
        	class="form-control" name="maintenances_submission_id" 
        	value="{{ $submission->id }}"
        >

        @if ($errors->has('maintenances_submission_id'))
            <span class="help-block">
                <strong>{{ $errors->first('maintenances_submission_id') }}</strong>
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

        <input id="student_id" type="text" 
            class="form-control" name="locker_id" 
            value="{{ $submission->locker_id }}"
        >

        @if ($errors->has('locker_id'))
            <span class="help-block">
                <strong>{{ $errors->first('locker_id') }}</strong>
            </span>
        @endif
	</div>

    <div class="form-group{{ $errors->has('sewa_id') ? ' has-error' : '' }}">
        <label for="sewa_id" class="col-md-4 control-label">
            No. Sewa :
        </label>

        <input id="student_id" type="text" 
            class="form-control" name="sewa_id" 
            value="{{ $submission->sewa_id }}"
        >

        @if ($errors->has('sewa_id'))
            <span class="help-block">
                <strong>{{ $errors->first('sewa_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('maintenance_type') ? ' has-error' : '' }}">
        <label for="maintenance_type" class="col-md-4 control-label">
            Jenis Perawatan :
        </label>

        <select name="maintenance_type" id="maintenance_type" class="form-control">
            <option value="">pilih jenis perawatan</option>
            <option value="pergantian kunci">pergantian kunci</option>
            <option value="perbaikan loker">perbaikan loker</option>
        </select>

        @if ($errors->has('maintenance_type'))
            <span class="help-block">
                <strong>{{ $errors->first('maintenance_type') }}</strong>
            </span>
        @endif
    </div>

	<div class="form-group">
		<button class="btn btn-info" type="submit">Submit</button>
	</div>
</form>