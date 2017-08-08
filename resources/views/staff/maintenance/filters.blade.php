<form action="/staff/maintenance" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" 
            name="id" placeholder="No. Perawatan"
            value="{{ old('id') }}" 
        >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" 
            name="nim" placeholder="NIM"
            value="{{ old('nim') }}" 
        >
    </div>

    <div class="form-group">
        <input type="text" class="form-control" 
            name="locker" placeholder="No. Loker"
            value="{{ old('locker') }}" 
        >
    </div>

    <div class="form-group">
        <select name="status" id="status" class="form-control">
            <option value="">pilih status..</option>
            <option value="pembayaran">pembayaran</option>
            <option value="pengambilan kunci">pengambilan kunci</option>
            <option value="berjalan">berjalan</option>
            <option value="selesai">selesai</option>
        </select>
    </div>

    <div class="form-group">
        <select name="type" id="type" class="form-control">
            <option value="">pilih jenis perbaikan</option>
            <option value="pergantian kunci">pergantian kunci</option>
            <option value="kerusakan loker">kerusakan loker</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info">Cari</button>
        <a href="/staff/maintenance" class="btn btn-link">reset</a>
    </div>
</form>