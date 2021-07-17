@extends('layouts.admin')
@section('css')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

@endsection

@section('header', 'Data Petugas')

@section('content')
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