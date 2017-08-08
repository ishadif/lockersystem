<form action="/staff/sewa" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" 
            name="id" placeholder="No. Sewa"
            value="{{ request('id') }}" 
        >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" 
            name="nim" placeholder="NIM"
            value="{{ request('nim') }}" 
        >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" 
            name="locker" placeholder="No. Loker"
            value="{{ request('locker') }}" 
        >
    </div>

    <div class="form-group">
        <select name="status" id="status" class="form-control">
            <option value="">pilih status..</option>
            <option value="pembayaran" {{ request('status') ? 'selected' : '' }}>pembayaran</option>
            <option value="pengambilan kunci" {{ request('status') ? 'selected' : '' }}>pengambilan kunci</option>
            <option value="berjalan" {{ request('status') ? 'selected' : '' }}>berjalan</option>
            <option value="selesai" {{ request('status') ? 'selected' : '' }}>selesai</option>
        </select>
    </div>
    
    <h4>tanggal input</h4>
    <div class="form-group">
        <label for="date" class="form-label">dari</label>
        <input type="date" class="form-control" 
            name="date[]" placeholder="Tanggal Dari.."
            value="{{ request('date')[0] }}" 
        >
    </div>

    <div class="form-group">
        <label for="date" class="form-label">sampai</label>
        <input type="date" class="form-control" 
            name="date[]" placeholder="Tanggal Dari.."
            value="{{ request('date')[1] }}" 
        >
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info">Cari</button>
        <a href="/staff/sewa" class="btn btn-link">reset</a>
    </div>
</form>