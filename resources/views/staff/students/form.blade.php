<form action="/staff/students" method="POST">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
	    <label for="id" class="col-md-4 control-label">
	    	NIM :
	    </label>

        <input id="id" type="text" 
        	class="form-control" name="id" 
        >

        @if ($errors->has('id'))
            <span class="help-block">
                <small>
                    <strong>{{ $errors->first('id') }}</strong>
                </small>
            </span>
        @endif
	</div>
    
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">
            Nama :
        </label>

        <input id="id" type="text" 
            class="form-control" name="name" 
        >

        @if ($errors->has('name'))
            <span class="help-block">
                <small>
                    <strong>{{ $errors->first('name') }}</strong>
                </small>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">
            Program Studi :
        </label>

        <select name="study_program_id" id="study_program_id" class="form-control">
            <option value="">Pilih program studi</option>
            @foreach($programs as $program)
                <option value="{{ $program->id }}" {{ old('study_program_id') ? 'selected' : '' }}>
                    {{ $program->name }}
                </option>
            @endforeach
        </select>

        @if ($errors->has('email'))
            <span class="help-block">
                <small>
                    <strong>{{ $errors->first('study_program_id') }}</strong>
                </small>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">
            Email :
        </label>

        <input id="email" type="text" 
            class="form-control" name="email" 
        >

        @if ($errors->has('email'))
            <span class="help-block">
                <small>
                    <strong>{{ $errors->first('email') }}</strong>
                </small>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">
            Alamat :
        </label>

        <input id="address" type="text" 
            class="form-control" name="address" 
        >

        @if ($errors->has('address'))
            <span class="help-block">
                <small>
                    <strong>{{ $errors->first('address') }}</strong>
                </small>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
        <label for="telephone" class="col-md-4 control-label">
            Telefon :
        </label>

        <input id="telephone" type="text" 
            class="form-control" name="telephone" 
        >

        @if ($errors->has('telephone'))
            <span class="help-block">
                <small>
                    <strong>{{ $errors->first('telephone') }}</strong>
                </small>
            </span>
        @endif
    </div>

	<div class="form-group">
		<button class="btn btn-info" type="submit">Submit</button>
	</div>
</form>