@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Produk
                    </div>
                    <div class="float-end">
                        <a href="{{ route('biodata.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Tinggi</th>
                                    <th>Berat</th>
                                    <th>Foto</th>
                                    <th width="160">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biodatas as $bio)
                                <tr>
                                    <td>{{ $bio->nama }}</td>
                                    <td>{{ $bio->jk }}</td>
                                    <td>{{ $bio->agama }}</td>
                                    <td>{{ $bio->tinggi_badan }}</td>
                                    <td>{{ $bio->berat_badan }}</td>
                                    <td>
                                        @if($bio->foto)
                                        <img src="{{ asset('storage/'.$bio->foto) }}" width="60">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('biodata.edit', $bio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('biodata.destroy', $bio->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                       
                    </div>
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

