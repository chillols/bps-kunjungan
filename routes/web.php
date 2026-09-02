<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitorController;
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
});

Route::get('/kunjungan', function () {
    return view('kunjungan.create');})
    ->name('kunjungan.create');

Route::get('/kunjungan', [VisitorController::class, 'create'])
    ->name('kunjungan.create');

Route::post('/kunjungan', [VisitorController::class, 'store'])
    ->name('kunjungan.store');

Route::get('/kunjungan/antrian/{id}', [VisitorController::class, 'antrian'])
    ->name('kunjungan.antrian');


// Admin routes
Route::get('/admin/daftarantrian', function () {
    return view('admin.daftarantrian');
})->name('admin.daftarantrian');

Route::get('/admin/datapengunjung', [AdminController::class, 'datapengunjung'])
    ->name('admin.datapengunjung');

Route::get('/admin/datapengunjung/{id}', [AdminController::class, 'detailPengunjung'])
    ->name('admin.datapengunjung.detail');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/riwayatkunjungan',[AdminController::class, 'riwayatkunjungan'])->name('admin.riwayatkunjungan');
    Route::get('/admin/riwayatkunjungan/{tanggal}',[AdminController::class, 'detailriwayatkunjungan'])->name('admin.detailriwayatkunjungan');
    Route::get('/admin/riwayatkunjungan/{tanggal}/export',[AdminController::class, 'exportriwayatkunjungan'])->name('admin.riwayatkunjungan.export');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
});

require __DIR__.'/auth.php';
