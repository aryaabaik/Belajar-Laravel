@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>Show Data Produk</legend>
                <div class="mb-3">
                    <label for="">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="{{ $prodak->nama_prodak }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input type="text" name="harga" class="form-control" value="{{ $prodak->harga }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="">Stok</label>
                    <input type="text" name="stok" class="form-control" value="{{ $prodak->stok }}" disabled>
                </div>
                <div class="mb-3">
                    <a href="{{ route("prodak.index") }}" class="btn btn-success">Kembali Pulang</a>
                </div>
            </fieldset>
        </div>
    </div>
</div>
@endsection

