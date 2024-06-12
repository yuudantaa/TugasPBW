@extends("layouts/main")
@section("title","obat")
@section('obat')
<div class="card">
    <div class="card-header">
    <a href="/obat/tambahobat" class="btn btn-primary"><i class="bi bi-plus-square"></i> obat</a>
</div>
<div class="card-body">
    @if(session('alert'))
        <div class="alert alert-warning alert-dismissible fade show" 
        role="alert">
            <strong>{{session("alert") }}</strong>
            <button type="button" class="close" data-dismiss="alert" 
            aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>namaObat</th>
            <th>jenisObat</th>
            <th>dosis</th>
            <th>harga</th>
            <th>tanggalProduksi</th>
            <th>tanggalKadaluarsa</th>
            <th>gambarObat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ob as $idx=>$o)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $o->namaObat }}</td>
                    <td>{{ $o->jenisObat }}</td>
                    <td>{{ $o->dosis }}</td>
                    <td>{{ $o->harga }}</td>
                    <td>{{ $o->tanggalProduksi }}</td>
                    <td>{{ $o->tanggalKadaluarsa }}</td>
                    <td><img src="{{ asset("/storage/".$o->gambarObat) }}" 
                    alt="{{ $o->gambarObat }}" height="80" width="80">
                    </td>
                    <td>
                        <a href="/obat/editobat/{{ $o->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <a href="/delete/{{ $o->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
                @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>namaObat</th>
            <th>jenisObat</th>
            <th>dosis</th>
            <th>harga</th>
            <th>tanggalProduksi</th>
            <th>tanggalKadaluarsa</th>
            <th>gambarObat</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>
</div>
</div>
@endsection