@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Relasi One To Many (Dosen - Mahasiswa)</h3>

    @foreach ($dosens as $dosen)
    <div class="card mb-3 shadow-sm">
      <div class="card-header bg-dark text-white">
        <strong>{{ $dosen->nama }}</strong> (NIPD: {{ $dosen->nipd }})
      </div>
    <div class="card-body">
        <h6>Daftar Mahasiswa Bimbingan :</h6>
        <ul class="list-group list-group-flush">
            @forelse ($dosen->mahasiswas as $mhs )
                <li class="list-group-item"> {{ $mhs->nama }} </li>

            @empty
                  <li class="list-group-item text-muted">Belum ada mahasiswa</li>
            @endforelse
        </ul>
    </div>
    </div>
        
    @endforeach
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