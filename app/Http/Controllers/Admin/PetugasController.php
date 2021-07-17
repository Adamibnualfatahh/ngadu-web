<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(){

        $petugas = Petugas::all();
        return view('Admin.Petugas.index', ['petugas' => $petugas]);
    }

    public function create(){
        return view('Admin.Petugas.create');
    }

    public function store(Request $request){

    }

    public function edit($id_petugas){
        return view('Admin.Petugas.edit');
    }

    public function update(Request $request, $id_petugas){

    }

    public function destroy($id_petugas){
        
    }
}
