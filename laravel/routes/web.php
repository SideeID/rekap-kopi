<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [adminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/admin/keuangan', [adminController::class, 'showKeuangan'])->name('admin.keuangan');
    Route::get('/admin/pendapatan', [adminController::class, 'showPendapatan'])->name('admin.pendapatan');
    Route::resource('admin/akun', PostController::class);
});

Route::get('/features', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->role === 'karyawan') {
        return redirect()->route('karyawan.dashboard');
    } else {
        return redirect()->route('login');
    }
})->name('features');

Route::middleware(['auth', 'is_karyawan'])->group(function () {
    Route::get('/karyawan/dashboard', [karyawanController::class, 'showDashboard'])->name('karyawan.dashboard');
});

Route::get('/tentang', function () {
    return view('tentang_kami');
})->name('about');

Route::get('/jadwal', function () {
    return view('jadwal');
})->name('jadwal');

Route::get('/prediksi', function () {
    return view('prediksi');
})->name('prediksi');

Route::post('/upload', [PredictionController::class, 'upload'])->name('upload');

// Route::post('/predict', [PredictionController::class, 'predict']);

// Route::get('/upload-form', function () {
//     return view('upload-form');
// });

// Route::post('/upload', [PredictionController::class, 'upload']);

Route::get('/cuaca', function () {
    return view('cuaca');
})->name('cuaca');

require __DIR__ . '/auth.php';
