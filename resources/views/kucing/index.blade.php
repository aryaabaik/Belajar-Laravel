@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="text-center fw-bold mb-4">🐾 Daftar Kucing Lucu 🐾</h2>

    @if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
        <a href="{{ route('kucing.create') }}" class="btn btn-primary">+ Tambah Kucing</a>
    </div>

    <table class="table table-striped table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Warna</th>
                <th>Umur</th>
                <th>Suara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kucing as $cat)
            <tr>
                <td>{{ $cat->nama }}</td>
                <td>{{ $cat->warna }}</td>
                <td>{{ $cat->umur }} tahun</td>
                <td>{{ $cat->suara }}</td>
                <td>
                    <a href="{{ route('kucing.show', $cat->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <a href="{{ route('kucing.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('kucing.destroy', $cat->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin mau melepas {{ $cat->nama }}? 😿')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada kucing nih... ayo adopsi satu! 🐈</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

