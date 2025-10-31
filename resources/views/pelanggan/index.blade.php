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
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($pelanggan as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{!! $data->alamat !!}</td>
                                    <td>{{ $data->no_hp}}</td>
                                    <td>
                                        <form action="{{ route('pelanggan.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('pelanggan.show', $data->id) }}" class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('pelanggan.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onclick="return confirm('Are You Sure ?');" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $pelanggan->withQueryString()->links('pagination::bootstrap-4') !!}
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

