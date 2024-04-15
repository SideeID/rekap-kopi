<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class adminController extends Controller
{
    public function showDashboard(): View {
        return view('dashboard');
    }

    public function showKeuangan(): View {
        return view('keuangan');
    }

    public function showPendapatan(): View {
        return view('pendapatan');
    }

    public function showAkun(): View {
        return view('akun');
    }
}
