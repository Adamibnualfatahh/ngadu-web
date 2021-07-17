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
        .btn-purple{
            background: #272042;
            border: 1px solid #272042;
            color: white;
            width: 100%
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
                                    <td>{{ $pengaduan->tgl_pengaduan }}</td>
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

        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">Tanggapan Petugas</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="input-group mb-3">
                                <select name="status" id="status" class="custom-select">
                                    @if ($pengaduan->status == '0 ')
                                    <option value="0">Pending</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    @elseif($pengaduan->status == 'proses')
                                    <option value="0">Pending</option>
                                    <option selected value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    @else
                                    <option value="0">Pending</option>
                                    <option value="proses">Proses</option>
                                    <option selected value="selesai">Selesai</option>
                                    @endif
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" cols="" rows="4" class="form-control" placeholder="Belum Ada Tanggapan!">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                        </div>
                        <button type="submit" btn btn-purple>KIRIM</button>
                    </form>
                    @if (Session::has('status'))
                        
                    <div class="alert alert-success mt-2">
                        {{ Session::get('status') }}
                    </div>

                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection