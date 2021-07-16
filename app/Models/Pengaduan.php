<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'tgl_pengaduan',
        'nis',
        'isi_laporan',
        'foto',
        'status',
    ];

    protected $dates = ['tgl_pengaduan'];

    public function user(){
        return $this->hasOne(Siswa::class, 'nis', 'nis');
    }
}
