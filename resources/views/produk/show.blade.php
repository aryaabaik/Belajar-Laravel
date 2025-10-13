@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Ini Diaa!!!
                    <a href="{{ route('produk.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>

                <div class="card-body">
                    @if ($produk->image)
                    <img src="{{ Storage::url($produk->image)  }}" class="w-100 rounded mb-3" alt="{{ $produk->nama }}">
                    @else
                    <img src="" class="w-100 rounded mb-3" alt="No Image">Gambar Tidak Ada
                    @endif

                    <h4 class="fw-bold">{{ $produk->nama }}</h4>
                    <p class="mt-2 mb-1">Harga: <strong>Rp{{ number_format($produk->harga, 0, ',', '.') }}</strong></p>
                    <p class="mt-2">{!! $produk->deskripsi !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="text-muted">Arya Adhitya XI RPL 3 </span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#twitter"></use>
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#instagram"></use>
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#facebook"></use>
                    </svg></a></li>
        </ul>
    </footer>
</div>

@endsection

