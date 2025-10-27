@push('styles')
<link rel="stylesheet" href="{{ asset('css/kucing.css') }}">
@endpush


@extends('layouts.app')

@section('content')


<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h4 class="mb-0 fw-bold">Detail Kucing Lucu 🐱</h4>
            <a href="{{ route('kucing.index') }}" class="btn btn-sm btn-outline-secondary">← Kembali</a>
        </div>

        <div class="card-body p-4">
            <div class="text-center mb-4">
                <img src="https://placekitten.com/250/250" alt="Kucing Lucu" class="rounded-circle shadow-sm">
            </div>

            <table class="table table-borderless align-middle">
                <tr>
                    <th class="text-end" style="width: 30%">Nama Kucing:</th>
                    <td class="fw-semibold">{{ $kucing->nama }}</td>
                </tr>
                <tr>
                    <th class="text-end">Warna Bulu:</th>
                    <td>{{ $kucing->warna }}</td>
                </tr>
                <tr>
                    <th class="text-end">Umur:</th>
                    <td>{{ $kucing->umur }} tahun</td>
                </tr>
                <tr>
                    <th class="text-end">Suara Khas:</th>
                    <td><em>"{{ $kucing->suara }}"</em></td>
                </tr>
            </table>

            <div class="mt-4 text-center">
                <a href="{{ route('kucing.edit', $kucing->id) }}" class="btn btn-warning me-2">
                    ✏️ Edit Data
                </a>
                <form action="{{ route('kucing.destroy', $kucing->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin mau melepas {{ $kucing->nama }}? 😿')" class="btn btn-danger">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="card-footer text-center text-muted small">
            <em>“Setiap kucing itu istimewa, apalagi {{ $kucing->nama }} 🐾”</em>
        </div>
    </div>
</div>
@endsection

