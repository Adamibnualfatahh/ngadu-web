@extends('layouts.admin')
@section('title', 'Detail Pengaduan')
    
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
    </style>
@endsection

@section('header')
    
<a href="{{ route('pengaduan.index') }}" class="text-primary">Data Pengaduan</a>
<a href="#" class="text-grey">/</a>
<a href="#" class="text-grey">Detail Pengaduan</a>

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Pengaduan Siswa
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nis</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->nis }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pengaduan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->tgl_penggaduan }}</td>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <td>:</td>
                                    <td><img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" class="embed-responsive"></td>
                                </tr>
                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->isi_laporan }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>
                                    @if ($pengaduan->status == '0')
                                    <a href="#" class="badge badge-danger">Pending</a>
                                    @elseif( $pengaduan->status == 'proses')
                                    <a href="#" class="badge badge-warning text-white">Proses</a>
                                    @else
                                    <a href="#" class="badge badge-success">Selesai</a>  
                                    @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection