@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Data Transaksi</div>
                <div class="card-body">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                        @method('PUT')
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
                            <input type="date" name="tanggal_transaksi" class="form-control @error('tanggal_transaksi') is-invalid  @enderror">
                            @error('tanggal_transaksi')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Pelanggan </label>
                            <select name="id_pelanggan" class="form-control @error('id_pelanggan') is-invalid @enderror" id="">
                                @foreach ($pelanggan as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_pelanggan ? 'selected' : '' }}> 
                                    {{ $data->nama }} 
                                </option>
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
                            <button type="submit" class="btn btn-block btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

