@extends('layouts.app')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: radial-gradient(circle at top left, #00aeffff, #ffffffff, #00aeffff);


        color: #fff;
        margin: 0;
        padding: 40px 0;
        min-height: 100vh;
    }

    /* === CARD STYLE === */
    .card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(18px);
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(255, 255, 255, 0.83),
            inset 0 0 25px rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.12);
        overflow: hidden;
        transition: 0.4s ease;
        animation: fadeUp 0.7s ease-in-out;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 50px rgba(255, 255, 255, 1);
    }

    /* === HEADER === */
    .card-header {
        background: linear-gradient(90deg, #00aeffff, #ffffffff, #00aeffff);


        color: #fff;
        font-weight: 600;
        font-size: 20px;
        padding: 15px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 0 20px rgba(0, 204, 255, 1);
    }

    /* === BUTTON TAMBAH === */
    .btn-outline-primary {
        border: 1px solid #00e0ff !important;
        color: #00e0ff !important;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-outline-primary:hover {
        background: #00e0ff !important;
        color: #0f2027 !important;
        box-shadow: 0 0 15px #00e0ff;
    }

    /* === TABLE === */
    .table {
        color: #e4e4e4;
        border-collapse: collapse;
        width: 100%;
    }

    .table thead {
        background: rgba(0, 153, 255, 0.25);
        color: #00e5ff;
        text-transform: uppercase;
        letter-spacing: 0.7px;
    }

    .table tbody tr {
        background: rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: rgba(0, 200, 255, 0.15);
        transform: scale(1.01);
        box-shadow: 0 0 20px rgba(0, 123, 255, 0.3);
    }

    /* === BUTTONS === */
    .btn-outline-dark {
        border-color: #00d4ff !important;
        color: #00d4ff !important;
    }

    .btn-outline-dark:hover {
        background: #00d4ff !important;
        color: #0b1721 !important;
        box-shadow: 0 0 15px #00d4ff;
    }

    .btn-outline-success {
        border-color: #32ff7e !important;
        color: #32ff7e !important;
    }

    .btn-outline-success:hover {
        background: #32ff7e !important;
        color: #0b1721 !important;
        box-shadow: 0 0 15px #32ff7e;
    }

    .btn-outline-danger {
        border-color: #ff6b6b !important;
        color: #ff6b6b !important;
    }

    .btn-outline-danger:hover {
        background: #ff6b6b !important;
        color: #ffffffff !important;
        box-shadow: 0 0 15px #ff6b6b;
    }

    /* === FOOTER === */
    footer {
        background: transparent;
        color: #aaa;
        border-top: 1px solid rgba(255, 255, 255, 0.15) !important;
    }

    footer .text-muted {
        color: #9aa6b2 !important;
    }

    footer a.text-muted:hover {
        color: #00e5ff !important;
        transition: 0.3s ease;
    }

    /* === ANIMASI === */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

</style>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Tambahkan Data Hobi
                    </div>
                    <div class="float-end">
                        <a href="{{ route('hobi.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('hobi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-abel">Nama Hobi</label>
                            <input type="text" class="form-control @error('nama_hobi') is-invalid @enderror" name="nama_hobi" value="{{ old('nama_hobi') }}" placeholder=" Name" required>
                            @error('nama_hobi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

