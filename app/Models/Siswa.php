<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Siswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primarykey = 'nis';
    protected $fillable = [
        'nis','nama','username','password','telp'
    ];
}
