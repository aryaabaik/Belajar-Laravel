@extends('layouts.app')

@section('content')
<style>
/* 🌐 UI LEVEL MAXX — PREMIUM DASHBOARD THEME */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

body {
background: linear-gradient(135deg, #eef3f9 0%, #f9fbfd 100%);
font-family: 'Inter', sans-serif;
color: #1f2937;
line-height: 1.6;
}

/* 🎴 Card Styling */
.card {
border-radius: 18px;
border: none;
background: #ffffff;
box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
transition: all 0.35s ease;
}

.card:hover {
transform: translateY(-4px);
box-shadow: 0 15px 35px rgba(13, 110, 253, 0.08);
}

.card-header {
background: linear-gradient(90deg, #007bff 0%, #0056d6 100%);
font-weight: 600;
letter-spacing: 0.3px;
border-bottom: none;
padding: 1rem 1.5rem;
box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);
}

.card-header h5 {
font-size: 20px;
text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

/* ✨ Button on Header */
.card-header .btn {
background: #fff;
color: #007bff;
font-weight: 600;
border-radius: 12px;
transition: all 0.3s ease;
border: 1px solid #ffffff40;
box-shadow: 0 3px 8px rgba(255,255,255,0.2);
}

.card-header .btn:hover {
background: #e9f2ff;
transform: scale(1.06);
}

/* 🔍 Search Box */
.input-group {
border-radius: 12px;
overflow: hidden;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.input-group input {
border: 1px solid #e0e6ed;
background: #f9fafc;
transition: all 0.3s;
}

.input-group input:focus {
border-color: #007bff;
box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.15);
}

.input-group .btn-outline-primary {
border: none;
background: #007bff;
color: #fff;
font-weight: 500;
transition: 0.3s;
}

.input-group .btn-outline-primary:hover {
background: #0056d6;
}

.btn-outline-secondary {
color: #6b7280;
border: none;
}

.btn-outline-secondary:hover {
background: #f1f5f9;
color: #111827;
}

/* 📊 Table Styling */
.table {
background: #ffffff;
border-radius: 12px;
overflow: hidden;
box-shadow: 0 4px 10px rgba(0,0,0,0.03);
}

.table thead {
background: linear-gradient(90deg, #f8fafc, #f1f5f9);
color: #1f2937;
font-weight: 600;
text-transform: uppercase;
letter-spacing: 0.4px;
font-size: 13px;
}

.table tbody tr {
transition: all 0.25s ease;
}

.table tbody tr:hover {
background: #f8fbff;
transform: scale(1.005);
}

.table td {
vertical-align: middle;
font-size: 15px;
}

/* 🪄 Badge Modern */
.badge {
border-radius: 10px;
font-size: 13px;
padding: 6px 12px;
font-weight: 500;
box-shadow: 0 2px 6px rgba(0,0,0,0.1);
letter-spacing: 0.3px;
}

.badge.bg-success {
background: linear-gradient(90deg, #00b09b, #96c93d);
}

.badge.bg-warning {
background: linear-gradient(90deg, #f7b733, #fc4a1a);
}

.badge.bg-info {
background: linear-gradient(90deg, #00c6ff, #0072ff);
}

/* 🧭 Action Buttons */
.btn-sm {
border-radius: 10px;
font-weight: 600;
padding: 6px 12px;
transition: all 0.3s ease;
border: none;
}

.btn-info {
background: linear-gradient(90deg, #00c6ff, #0072ff);
color: #fff;
}

.btn-warning {
background: linear-gradient(90deg, #ffb347, #ffcc33);
color: #fff;
}

.btn-danger {
background: linear-gradient(90deg, #ff416c, #ff4b2b);
color: #fff;
}

.btn-info:hover, .btn-warning:hover, .btn-danger:hover {
transform: translateY(-2px);
box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

/* ⚙️ Alert Styling */
.alert-success {
background: #e8f9ee;
border-left: 5px solid #22c55e;
color: #14532d;
border-radius: 10px;
}

/* 📱 Responsive Optimizations */
@media (max-width: 768px) {
.table {
font-size: 13px;
}

.card-header h5 {
font-size: 16px;
}

.btn-sm {
padding: 4px 8px;
font-size: 12px;
}
}


</style>
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Pembayaran</h5>
            <a href="{{ route('pembayaran.create') }}" class="btn btn-light btn-sm">+ Tambah Pembayaran</a>
        </div>

        <div class="card-body">
            {{-- Search --}}
            <form action="{{ route('pembayaran.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari kode transaksi..." value="{{ $search }}">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                    @if($search)
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>

            {{-- Alert sukses --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Bayar</th>
                            <th>Metode</th>
                            <th>Jumlah Bayar</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembayarans as $pembayaran)
                        <tr>
                            <td>{{ $loop->iteration + ($pembayarans->currentPage() - 1) * $pembayarans->perPage() }}</td>
                            <td>{{ $pembayaran->transaksi->kode_transaksi ?? '-' }}</td>
                            <td>{{ $pembayaran->transaksi->pelanggan->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $pembayaran->metode_pembayaran == 'cash' ? 'success' : ($pembayaran->metode_pembayaran == 'credit' ? 'warning' : 'info') }}">
                                    {{ ucfirst($pembayaran->metode_pembayaran) }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($pembayaran->kembalian, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('pembayaran.show', $pembayaran->id) }}" class="btn btn-sm btn-info text-white">
                                    Show
                                </a>
                                <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-sm btn-warning text-white">
                                    Edit
                                </a>
                                <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data pembayaran</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $pembayarans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
