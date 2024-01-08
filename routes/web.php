<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArsipNotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaPenggunaController;
use App\Http\Controllers\DashboardAplikasiController;

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
    return view('auth.login');
});

Route::resource('dashboardaplikasi', DashboardAplikasiController::class)->middleware(['auth']);
Route::resource('dashboard', DashboardController::class)->middleware(['auth']);
Route::resource('arsipnota', ArsipNotaController::class)->middleware(['auth']);
Route::resource('kelolapengguna', KelolaPenggunaController::class)->middleware(['auth']);
Route::get('/cari', [ArsipNotaController::class, 'getDataFilter'])->name('cari')->middleware(['auth']);
Route::get('/download/{filename}', [ArsipNotaController::class, 'download'])->name('download')->middleware(['auth']);


require __DIR__.'/auth.php';
