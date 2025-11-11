@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>Show Data Pelanggan</legend>
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" disabled> {{ $pelanggan->alamat }} </textarea>
                </div>
                <div class="mb-3">
                    <label for="">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}" disabled>
                </div>
                <div class="mb-3">
                    <a href="{{ route("pelanggan.index") }}" class="btn btn-success">Kembali Pulang</a>
                </div>
            </fieldset>
        </div>
    </div>
</div>
@endsection

