@extends('layouts.admin')
@section('css')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>
    .btn-petugas{
        background: #272042;
        border: 1px solid #272042;
        color: white;
        width: 20%;
    }
    .btn-petugas:hover{
        background: #6554aa;
        border: 1px solid #6554aa;
        color: white;
        width: 20%;
    }
</style>

@endsection

@section('header', 'Data Petugas')

@section('content')
    <a href="{{ route('petugas.create') }}" class="btn btn-petugas mb-3">Tambah Petugas +</a>
    <table id="petugasTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Level</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->nama_petugas }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->telp }}</td>
                <td>{{ $v->level }}</td>
                <td>
                    <a href="{{ route('petugas.edit', $v->id_petugas) }}" style="text-decoration: underline">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>

$(document).ready(function() {
    $('#petugasTable').DataTable();
} );

</script>

@endsection