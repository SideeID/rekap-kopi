<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        $countKaryawan = User::where('role', 'karyawan')->count();
        $countAdmin = User::where('role', 'admin')->count();

        return view('akun.index', compact('users', 'countKaryawan', 'countAdmin'));
    }
}
