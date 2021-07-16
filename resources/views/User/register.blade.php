@extends('layouts.user')

@section('css')
<style>
    body {
        background: #fff;
    }

    .btn-purple {
        background: #272042;
        width: 100%;
        color: #fff;
        font: bold;
    }
    .btn-purple:hover {
        color: #fff;
        background: #3b3068;
    }
    .card {
        background-color: #fff;
    }
</style>
@endsection

@section('title', 'Halaman Daftar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <h2 class="text-center text-white mb-2 mt-0">Ngadu</h2>
            <P class="text-center text-white mb-3">Pengaduan Siswa</P>
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center mb-5">FORM DAFTAR</h2>
                    <form action="{{ route('pekat.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="number" name="nis" placeholder="NIS" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="telp" placeholder="No. Telp" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-purple">REGISTER</button>
                    </form>
                </div>
            </div>
            @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
            @endif
            <a href="{{ route('pekat.index') }}" class="btn text-primary mt-3 mb-5 content-center" style="width: 50%">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>
@endsection
