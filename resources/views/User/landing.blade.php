@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="/frontend/style/main.css">
@endsection

@section('title', 'Ngadu')

@section('content')
{{-- Section Header --}}

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="frontend/images/logo.png" alt="Logo-Ngadu">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @if(Auth::guard('siswa')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline">{{ Auth::guard('siswas')->user()->nama }}</a>
                        </li>
                    </ul>
                    @else
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">  
                                </a>
                            </li>
                            <li class="nav-item">   
                            </li>
                        </ul>
                <div class="btn-mada" class="ml-auto">
                    <a href="#" class="btn btn-masuk" data-target="#loginModal" data-toggle="modal">Masuk</a>
                    <a href="{{ route('pekat.formRegister') }}" class="btn btn-daftar">Daftar</a>
                </div>
                @endauth
            </div>
        </div>
    </nav>
    
    <button id="back-to-top-btn">
        <i class="fas fa-arrow-up">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
        </svg>
        </i>
    </button>

{{-- Section Card Pengaduan --}}
<div class="container">
    <div class="row d-flex align-items-center">
        <div class="col">
            <div class="jumbotron bg-white">
                <h1 class="info">
                    Layanan Pengaduan Online Siswa
                </h1>
                <p class="lead mb-5">
                    sampaikan laporan anda kepada pihak <br/> berwajib sekarang
                </p>
                <a class="btn-laporkan btn-lg " href="#lapor" role="button">Laporkan</a>
            </div>
        </div>
        <div class="col ">
            <img src="frontend/images/img-hero.png" alt="" class="float-right d-none  d-sm-block float-lg-start img-fluid" width="460">
        </div>
    </div >
    <div class="row justify-content-center" id="lapor">
        <div class="col-lg-6 col-10 col">
            <div class="content shadow">
    
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
    
                @if (Session::has('pengaduan'))
                    <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                @endif
    
                <div class="card mb-3">Tulis Laporan Disini</div>
                <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                            rows="4">{{ old('isi_laporan') }}</textarea>
                    </div>
                    <div class="form-group ">
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-custom mt-2">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Section Hitung Pengaduan --}}
<div class="pengaduan mt-5">
    <div class="bg-purple">
        <div class="text-center">
            <h5 class="medium text-white mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-white">10</h2>
        </div>
    </div>
</div>
{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2021 • All rights reserved</p>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3 mb-3" style="width: 100%;">MASUK</button>
                    <p>Belum Punya Akun?<a href="{{ route('pekat.formRegister') }}" type="submit"  style="">Daftar</a></p>
                    
                </form>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

</div>


@endsection

@section('js')
    @if (Session::has('pesan'))
    <script>
        $('#loginModal').modal('show');

    </script>
    @endif
@endsection