<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function formLogin()
    {
        return view('Admin.login');
    }

    public function login(Request $request)
    {
        $username = Petugas::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar!']);
        }
        $password = Hash::check($request->password,$username->password); 
        if (!$password){
            return redirect()->back()->with(['pesan' => 'password tidak sesuai!']);
        }

        $auth = Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]);
       
        if($auth) {
            return redirect()->route('dashboard.index');
        }else {
            return redirect()->back()->with(['pesan' => 'Akun Tidak Terdaftar']);
        }
    }

    public function logout() 
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.formLogin');
    }
}
