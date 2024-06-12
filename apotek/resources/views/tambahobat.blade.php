@extends("layouts/main")
@section("title","form tambah obat")
@section("obat")
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">   
        <form action="/save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="namaObat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jenis Obat</label>
                <select name="jenisObat">
                    <option value="0">pilih Jenis</option>
                    <option value="pil">pil</option>
                    <option value="kapsul">kapsul</option>
                    <option value="sirup">sirup</option>
                    <option value="serbuk">serbuk</option>
                    <option value="oles">oles</option>
                </select>
            </div>
            <div class="form-group">
                <label>Dosis</label>
                <input type="number"name="dosis" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number"name="harga" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Produksi</label>
                <input type="date"name="tanggalProduksi" min="2022" max="2030" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kadaluarsa</label>
                <input type="date"name="tanggalKadaluarsa" min="2022" max="2030" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Gambar Obat</label>
                <input type="file" name="gambarObat" class="form-control-file" accept="image/*">
            </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">simpan</button>
                </div>
        </form>
    </div>
</div>
@endsection