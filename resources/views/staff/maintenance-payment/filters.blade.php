<form action="/staff/maintenance-payments" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" 
            name="id" placeholder="No. Pembayaran"
            value="{{ request('id') }}" 
        >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" 
            name="maintenanceId" placeholder="No. Perawatan"
            value="{{ request('maintenanceId') }}" 
        >
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
        <a href="/staff/maintenance-payments" class="btn btn-link">reset</a>
    </div>
</form>