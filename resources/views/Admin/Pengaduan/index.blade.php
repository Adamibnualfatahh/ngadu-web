@extends('layouts.admin')

@section('css')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

@endsection

@section('header', 'Data Pengaduan')
    
@section('content')
    
<table id="pengaduanTable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengaduan as $k => $v)
        <tr>
            <td>{{ $k += 1 }}</td>
            <td>{{ $v->tgl_penggaduan->format('d-M-y') }}</td>
            <td>{{ \Illuminate\Support\Str::limit($v->isi_laporan,150,$end='...') }}</td>
            <td>
                @if ($v->status == '0')
                    <a href="#" class="badge badge-danger">Pending</a>
                @elseif( $v->status == 'proses')
                <a href="#" class="badge badge-warning text-white">Proses</a>
                @else
                <a href="#" class="badge badge-success">Selesai</a>  
                @endif
            </td>
            <td>
                <a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" style="text-decoration: underline">Lihat</a>
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
    $('#pengaduanTable').DataTable();
} );

</script>

@endsection