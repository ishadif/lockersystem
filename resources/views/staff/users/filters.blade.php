<form action="/staff/users" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" 
            name="id" placeholder="NIK"
            value="{{ request('id') }}" 
        >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" 
            name="name" placeholder="name"
            value="{{ request('name') }}" 
        >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" 
            name="email" placeholder="E-mail"
            value="{{ request('email') }}" 
        >
    </div>

    <div class="form-group">
        <select name="division" id="division" class="form-control">
            <option value="">pilih divisi..</option>
            @foreach($roles as $role)
                <option value="{{ $role->slug }}" {{ request('division') == $role->name ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info">Cari</button>
        <a href="/staff/users" class="btn btn-link">reset</a>
    </div>
</form>