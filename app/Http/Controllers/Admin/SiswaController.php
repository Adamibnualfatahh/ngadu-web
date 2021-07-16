<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
       return view('Admin.Siswa.index');
    }

    public function show($nis)
    {
        return view('Admin.Siswa.show');
    }
}
