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
        /* === TABLE WRAPPER === */
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        /* === HEADER === */
        .table thead tr {
            background: #2563eb;
            color: #fff;
            text-align: center;
        }

        .table thead th {
            padding: 12px 14px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border: none;
        }

        /* === ROW & CELL === */
        .table tbody tr {
            background: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
        }

        .table tbody tr:hover {
            background: #f0f7ff;
            transform: scale(1.01);
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.15);
        }

        .table td {
            padding: 10px 14px;
            text-align: center;
            border: none;
            color: #374151;
            font-weight: 500;
        }

        /* === NOMOR KOLOM === */
        .table td:first-child {
            font-weight: 600;
            color: #000000ff;
        }

        /* === AKSI KOLOM === */
        .table td:last-child {
            white-space: nowrap;
        }

        /* === BUTTON Aksi === */
        .table td:last-child {
        display: flex;
        justify-content: center;
        gap: 8px;
        }

        .btn-outline-dark {
            border: 1px solid #6b7280 !important;
            color: #374151 !important;
            transition: 0.2s;
        }

        .btn-outline-dark:hover {
            background: #6b7280 !important;
            color: #fff !important;
        }

        .btn-outline-success {
            border: 1px solid #16a34a !important;
            color: #16a34a !important;
        }

        .btn-outline-success:hover {
            background: #16a34a !important;
            color: #fff !important;
        }

        .btn-outline-danger {
            border: 1px solid #dc2626 !important;
            color: #dc2626 !important;
        }

        .btn-outline-danger:hover {
            background: #dc2626 !important;
            color: #fff !important;
        }

        

        /* === PAGINATION === */
        .pagination {
            justify-content: center;
            margin-top: 15px;
        }

        .page-link {
            color: #2563eb;
            border: none;
            font-weight: 500;
        }

        .page-item.active .page-link {
            background-color: #2563eb;
            border-radius: 6px;
        }


    /* === FOOTER === */
    footer {
        background: transparent;
        color: #000000ff;
        border-top: 1px solid rgba(0, 0, 0, 0.15) !important;
    }

    footer .text-muted {
        color: #000000ff !important;
    }

    footer a.text-muted:hover {
        color: #000000ff !important;
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start ">
                        Dosen
                    </div>
                    <div class="float-end">
                        <a href="{{ route('hobi.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Daftar Nama Hobi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($hobi as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_hobi }}</td>
                                    <td>
                                        <form action="{{ route('hobi.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('hobi.show', $data->id) }}" class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('hobi.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
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
                        {!! $hobi->withQueryString()->links('pagination::bootstrap-4') !!}
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

