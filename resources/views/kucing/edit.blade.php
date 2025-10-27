


@extends('layouts.app')

@section('content')


<div class="container mt-4">
    <h3 class="mb-3">Tambah Kucing Lucu 🐱</h3>
    <form action="{{ route('kucing.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Warna</label>
            <input type="text" name="warna" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Suara</label>
            <input type="text" name="suara" class="form-control" placeholder="contoh: Meong~" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan 😺</button>
        <a href="{{ route('kucing.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

