@extends('layouts.app')

@section('content')
{{-- <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

body {
font-family: 'Poppins', sans-serif;
background: linear-gradient(135deg, #f0f7ff, #e0ecff);
min-height: 100vh;
display: flex;
flex-direction: column;
justify-content: center;
transition: background 0.8s ease;
}

.container {
animation: fadeInUp 1s ease;
}

.card {
border: none;
border-radius: 20px;
box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
overflow: hidden;
background: #ffffff;
transition: all 0.4s ease;
}

.card:hover {
transform: translateY(-5px);
box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

.card-header {
background: linear-gradient(90deg, #4a90e2, #357ab8);
color: white;
font-weight: 600;
padding: 15px 20px;
font-size: 18px;
letter-spacing: 0.5px;
border: none;
transition: background 0.3s ease;
}

.table {
margin-top: 15px;
border-radius: 10px;
overflow: hidden;
}

.table thead {
background-color: #e6f0ff;
}

.table th {
font-weight: 600;
color: #444;
}

.table-striped tbody tr:nth-of-type(odd) {
background-color: #f9fbff;
}

.table tbody tr:hover {
background-color: #eef6ff;
transform: scale(1.01);
transition: all 0.2s ease;
}

.btn-outline-primary,
.btn-outline-success,
.btn-outline-dark,
.btn-outline-danger {
border-radius: 12px;
transition: all 0.3s ease;
}

.btn-outline-primary:hover {
background: #357ab8;
color: white;
box-shadow: 0 0 10px rgba(53, 122, 184, 0.5);
}

.btn-outline-success:hover {
background: #28a745;
color: white;
box-shadow: 0 0 10px rgba(40, 167, 69, 0.4);
}

.btn-outline-dark:hover {
background: #343a40;
color: white;
box-shadow: 0 0 10px rgba(52, 58, 64, 0.4);
}

.btn-outline-danger:hover {
background: #dc3545;
color: white;
box-shadow: 0 0 10px rgba(220, 53, 69, 0.4);
}

/* Footer */
footer {
opacity: 0;
animation: fadeIn 1.2s ease forwards;
animation-delay: 0.5s;
}

/* Animations */
@keyframes fadeInUp {
0% {
opacity: 0;
transform: translateY(20px);
}
100% {
opacity: 1;
transform: translateY(0);
}
}

@keyframes fadeIn {
from { opacity: 0; }
to { opacity: 1; }
}



</style> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start ">
                        Dosen
                    </div>
                    <div class="float-end">
                        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($transaksis as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->kode_transaksi }}</td>
                                    <td>{{ $data->tanggal }}</td>
                                    <td>{{ $data->pelanggans->nama ?? '' }}</td>
                                    <td>{{ $data->total_harga }}</td>
                                    <td>
                                        <form action="{{ route('transaksi.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('transaksi.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
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

    