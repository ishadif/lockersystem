<form action="/staff/maintenance/{{ $maintenance->id }}/payment" method="POST">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('maintenance_id') ? ' has-error' : '' }}">
	    <label for="maintenance_id" class="col-md-4 control-label">
	    	No. Perawatan :
	    </label>

        <input id="maintenance_id" type="text" 
        	class="form-control" name="maintenance_id" 
        	value="{{ $maintenance->id }}"
        >

        @if ($errors->has('maintenance_id'))
            <span class="help-block">
                <strong>{{ $errors->first('maintenance_id') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
	    <label for="student_id" class="col-md-4 control-label">
	    	NIM :
	    </label>

        <input id="student_id" type="text" 
        	class="form-control" name="student_id" 
        	value="{{ $maintenance->student_id }}"
        >

        @if ($errors->has('student_id'))
            <span class="help-block">
                <strong>{{ $errors->first('student_id') }}</strong>
            </span>
        @endif
	</div>

    <div class="form-group{{ $errors->has('maintenance_type') ? ' has-error' : '' }}">
        <label for="maintenance_type" class="col-md-4 control-label">
            <span class="glyphicon glyphicon-list"></span> Jenis Perawatan :
        </label>

        <input id="maintenance_type" type="text" 
            class="form-control" name="maintenance_type" 
            value="{{ $maintenance->maintenance_type }}"
            disabled 
        >

        @if ($errors->has('maintenance_type'))
            <span class="help-block">
                <strong>{{ $errors->first('maintenance_type') }}</strong>
            </span>
        @endif
    </div>

	<div class="form-group{{ $errors->has('fee') ? ' has-error' : '' }}">
	    <label for="fee" class="col-md-4 control-label">
	    	Biaya :
	    </label>

        <input id="student_id" type="text" 
            class="form-control" name="fee" 
            value="{{ $maintenance->fee }}"
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