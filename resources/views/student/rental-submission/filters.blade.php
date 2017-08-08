<form class="form-inline" action="/permohonan" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" 
            name="id" placeholder="cari No. Permohonan.."
            value="{{ request('id') }}" 
        >
    </div>

    <div class="form-group">
        <select name="approved" id="approved" class="form-control" >
            <option value="">pilih status..</option>
            <option value="1" {{ request('approved') == '1' ? 'selected' : '' }}>disetujui</option>
            <option value="0" {{ request('approved') == '0' ? 'selected' : '' }}>belum disetujui</option>
        </select>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-default">Cari</button>
        <a href="/permohonan" class="btn btn-link">reset</a>
    </div>
</form>