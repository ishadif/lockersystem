<form action="/staff/profile" class="form-horizontal" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
        <label for="id" class="col-md-4 control-label">NIK</label>
    
        <div class="col-md-6">
            <input id="id" type="text" class="form-control" name="id" value="{{ $staff->id }}" disabled>
    
            @if ($errors->has('id'))
                <span class="help-block">
                    <strong>{{ $errors->first('id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">name</label>
    
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ $staff->name }}" disabled>
    
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
        <label for="roles" class="col-md-4 control-label">roles</label>
    
        <div class="col-md-6">
            <input id="roles" type="text" class="form-control" name="roles" value="{{ $staff->roles->first()->name }}" disabled>
    
            @if ($errors->has('roles'))
                <span class="help-block">
                    <strong>{{ $errors->first('roles') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">email</label>
    
        <div class="col-md-6">
            <input id="email" type="text" class="form-control" name="email" value="{{ $staff->email ?: old('email') }}">
    
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button class="btn btn-info" type="submit">Update</button>
        </div>
    </div>
</form>