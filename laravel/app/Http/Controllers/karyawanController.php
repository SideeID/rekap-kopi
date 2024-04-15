<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class karyawanController extends Controller
{
    public function showDashboard(): View
    {
        return view('dashboard');
    }
}
