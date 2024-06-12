@extends("layouts/main")
@section("title","form edit obat")
@section("obat")
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">   
        <form action="/update/{{ $ob->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="namaObat"  class="form-control" value="{{ $ob->namaObat }}" required>
            </div>
            <div class="form-group">
                <label>Jenis Obat</label>
                <select name="jenisObat">
                    <option value="0">pilih Jenis</option>
                    <option value="pil" {{ ($ob->jenisObat=="pil") ? "selected":" " }}>pil</option>
                    <option value="kapsul" {{ ($ob->jenisObat=="kapsul") ? "selected":" " }}>kapsul</option>
                    <option value="sirup" {{ ($ob->jenisObat=="sirup") ? "selected":" " }}>sirup</option>
                    <option value="serbuk" {{ ($ob->jenisObat=="serbuk") ? "selected":" " }}>serbuk</option>
                    <option value="oles" {{ ($ob->jenisObat=="oles") ? "selected":" " }}>oles</option>
                </select>
            </div>
            <div class="form-group">
                <label>Dosis</label>
                <input type="number"name="dosis" class="form-control" value="{{ $ob->dosis }}" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number"name="harga" class="form-control" value="{{ $ob->harga }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Produksi</label>
                <input type="date"name="tanggalProduksi" class="form-control" min="2022" max="2030" value="{{ $ob->tanggalProduksi }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kadaluarsa</label>
                <input type="date"name="tanggalKadaluarsa" class="form-control" min="2022" max="2030" value="{{ $ob->tanggalKadaluarsa }}" required>
            </div>
            <div class="form-group">
                <label>Gambar Obat</label>
                <input type="file" name="gambarObat" class="form-control-file" accept="image/*">
            </div>
            <div>
            <div class="form-group">
                    <img src="{{ asset("storage/".$ob->gambarObat) }}"
                    alt="{{ $ob->gambarObat }}" height="80" widht="80">
            </div>
            </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">simpan</button>
                </div>
        </form>
    </div>
</div>
@endsection