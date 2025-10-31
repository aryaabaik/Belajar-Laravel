@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    }

    body {
    background: linear-gradient(135deg, #f8fbff, #e6f0ff, #f3e8ff);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    overflow-x: hidden;
    opacity: 0;
    animation: fadeInPage 1s ease forwards;
    }

    /* Animasi masuk seluruh halaman */
    @keyframes fadeInPage {
    from {
    opacity: 0;
    transform: scale(0.98);
    filter: blur(5px);
    }
    to {
    opacity: 1;
    transform: scale(1);
    filter: blur(0);
    }
    }

    .container {
    margin-top: 80px;
    animation: slideUp 1s ease-out;
    }

    @keyframes slideUp {
    0% {
    opacity: 0;
    transform: translateY(30px);
    }
    100% {
    opacity: 1;
    transform: translateY(0);
    }
    }

    /* === CARD === */
    .card {
    border: none;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 30px rgba(0, 115, 255, 0.1);
    overflow: hidden;
    transform: translateY(20px);
    opacity: 0;
    animation: cardPopUp 0.8s ease forwards;
    animation-delay: 0.4s;
    }

    @keyframes cardPopUp {
    from {
    opacity: 0;
    transform: translateY(25px);
    }
    to {
    opacity: 1;
    transform: translateY(0);
    }
    }

    .card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 40px rgba(0, 115, 255, 0.25);
    transition: all 0.4s ease;
    }

    /* === HEADER === */
    .card-header {
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    color: #fff;
    font-weight: 600;
    font-size: 1.2rem;
    padding: 15px 20px;
    border: none;
    letter-spacing: 0.5px;
    text-shadow: 0 1px 5px rgba(255, 255, 255, 0.6);
    }

    .card-header .btn-outline-primary {
    border-color: #fff;
    color: #fff;
    transition: all 0.3s ease;
    }

    .card-header .btn-outline-primary:hover {
    background-color: #fff;
    color: #4facfe;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }

    /* === ISI CARD === */
    .card-body {
    padding: 30px;
    opacity: 0;
    animation: fadeUp 1s ease-in-out 0.6s forwards;
    }

    @keyframes fadeUp {
    from {
    opacity: 0;
    transform: translateY(15px);
    }
    to {
    opacity: 1;
    transform: translateY(0);
    }
    }

    .card-body h5 {
    font-weight: 600;
    font-size: 1.2rem;
    color: #007bff;
    margin-bottom: 15px;
    }

    .card-body p {
    color: #444;
    font-size: 15px;
    margin-bottom: 10px;
    }

    .card-body ul {
    margin-left: 25px;
    color: #555;
    }

    /* === FOOTER === */
    footer {
    margin-top: auto;
    text-align: center;
    padding: 20px;
    opacity: 0;
    animation: footerAppear 1s ease-in-out 1s forwards;
    }

    @keyframes footerAppear {
    from {
    opacity: 0;
    transform: translateY(20px);
    }
    to {
    opacity: 1;
    transform: translateY(0);
    }
    }

    footer span {
    font-weight: 500;
    color: #333;
    }

    footer .nav a {
    color: #666;
    transition: color 0.3s ease, transform 0.3s ease;
    }

    footer .nav a:hover {
    color: #007bff;
    transform: scale(1.1);
    }


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Ini Diaa!!!
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>

                <div class="card-body">

                    <h5><strong>Nama Mahasiswa : {{ $mahasiswa->nama }}</strong></h5>
                    <p><strong>NIM : {{ $mahasiswa->nim }}</strong></p>
                    <p><strong>Dosen Pembimbing : {{ $mahasiswa->dosen->nama }}</strong> </p>
                    <p><strong>Nama Wali : {{ $mahasiswa->wali->nama ?? '' }}</strong> </p>
                    <p><strong>Hobi     :
                        <ul>
                        @foreach($mahasiswa->hobis as $hobi)
                            <li>{{ $hobi->nama_hobi }}</li>
                        @endforeach
                        </ul>
                    </strong>
                    </p>
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

