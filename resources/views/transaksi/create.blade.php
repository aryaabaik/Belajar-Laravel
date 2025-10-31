@extends('layouts.app')
@section('content')
{{-- <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    body {
        background: linear-gradient(135deg, #f8fbff, #e6f0ff);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.8s ease-in-out;
    }

    
    /* CARD STYLE */
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(15px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: slideUp 0.8s ease forwards;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, #5e72e4, #825ee4);
        color: white;
        font-weight: 600;
        border-radius: 20px 20px 0 0;
        text-align: center;
        letter-spacing: 1px;
        padding: 15px;
    }

    /* FORM INPUTS */
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 10px;
        transition: all 0.3s ease;
        padding: 10px 15px;
    }

    .form-control:focus {
        border-color: #5e72e4;
        box-shadow: 0 0 10px rgba(94, 114, 228, 0.3);
    }

    /* LABELS */
    label {
        font-weight: 500;
        color: #333;
        margin-bottom: 6px;
        display: inline-block;
    }

    /* BUTTON */
    .btn {
        background: linear-gradient(135deg, #5e72e4, #825ee4);
        border: none;
        color: white;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 500;
        width: 100%;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background: linear-gradient(135deg, #4c63d2, #6d4edc);
        box-shadow: 0 5px 15px rgba(94, 114, 228, 0.4);
        transform: translateY(-2px);
    }

    /* ANIMATIONS */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(15px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        0% {
            opacity: 0;
            transform: translateY(40px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

</style> --}}


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Data Transaksi</div>
                <div class="card-body">
                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Kode Transaksi</label>
                            <input type="text" name="kode_transaksi" class="form-control @error('kode_transaksi') is-invalid @enderror">
                            @error('kode_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal Transaksi</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid  @enderror">
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Pelanggan </label>
                            <select name="id_pelanggan" class="form-control @error('id_pelanggan') is-invalid @enderror" id="">
                                @foreach ($pelanggans as $data)
                                <option value="{{ $data->id }}"> {{ $data->nama ?? '' }} </option>
                                @endforeach
                            </select>
                            @error('id_pelanggan')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Total Harga</label>
                            <input type="text" name="total_harga" class="form-control @error('total_harga') is-invalid @enderror">
                            @error('total_harga')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
