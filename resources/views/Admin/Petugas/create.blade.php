@extends('layouts.admin')

@section('title', 'Tambah Petugas')
    
@section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;

        }
        .text-grey {
            color: #6c757d ;
        }
        .text-grey:hover {
            color: #6c757d ;
        }
        .card-header {
            background: #272042;
            color: #fff;
        }
        .card {
            background: #f1f1f1;
        }

    </style>
@endsection

@section('header')
    
<a href="{{ route('petugas.index') }}" class="text-primary">Data Petugas</a>
<a href="#" class="text-grey">/</a>
<a href="#" class="text-grey">Form Tambah Petugas</a>

@endsection

@section('content')

<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Form Tambah Petugas
            </div>
            <div class="card-body">
                <form action="{{ route('petugas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_petugas">Nama Petugas</label>
                    <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telp">No Telp</label>
                    <input type="number" name="telp" id="telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <div class="imput-group mt-3">
                        <select name="level" id="level" class="custom-select">
                            <option value="petugas" selected>Pilih Level (Default Petugas)</option>
                            <option value="admin" selected>Admin</option>
                            <option value="petugas" selected>Petugas</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" style="width: 100%">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        @if (Session::has('user'))
            <div class="alert alert-danger">
                {{ Session::get('username') }}
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            
        @endif
    </div>
</div>
    
@endsection