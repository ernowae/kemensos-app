<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangPimpinanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LansiaController;
use App\Http\Controllers\PendampingController;
use App\Http\Controllers\PengajuanBaruPimpinanController;
use App\Http\Controllers\PengajuanPimpinanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePendampingController;
use App\Http\Controllers\profilePimpinanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

// pimpinan
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('sesi', SesiController::class);
    Route::resource('wilayah', WilayahController::class);
    Route::resource('lansia', LansiaController::class);
    Route::resource('pendamping', PendampingController::class);
    Route::post('/pendamping-lansia', [PendampingController::class, 'storeLansia'])->name('pendamping.storeLansia');
    Route::put('/pendamping-lansia/{data:id}', [PendampingController::class, 'destroyLansia'])->name('pendamping.destroyLansia');
    Route::resource('pimpinan', PimpinanController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('profile-pimpinan', profilePimpinanController::class);
    Route::resource('profile-pendamping', ProfilePendampingController::class);
    // pengajuan baru
    // Route::get('/pengajuan-baru', [PengajuanPimpinanController::class, 'index'])->name('pengajuan-baru.index');
    // Route::get('/pengajuan-show/{pengajuanPimpinan}', [PengajuanPimpinanController::class, 'show'])->name('pengajuan-baru.show');
    // Route::put('/pengajuan-terima/{pengajuanPimpinan}', [PengajuanPimpinanController::class, 'updateterima'])->name('pengajuan-baru.terima');
    // Route::put('/pengajuan-tolak/{pengajuanPimpinan}', [PengajuanPimpinanController::class, 'updatetolak'])->name('pengajuan-baru.tolak');
    // pengajuan baru

    // pengajuan diterima
    // Route::get('/pengajuan-show/{pengajuanPimpinan}', [PengajuanPimpinanController::class, 'show'])->name('pengajuan-baru.show');
    Route::put('/pengajuan-terima/{pengajuanPimpinan}', [PengajuanPimpinanController::class, 'updateterima'])->name('pengajuan-baru.terima');
    Route::put('/pengajuan-tolak/{pengajuanPimpinan}', [PengajuanPimpinanController::class, 'updatetolak'])->name('pengajuan-baru.tolak');
    Route::put('/pengajuan-reset/{pengajuanPimpinan}', [PengajuanPimpinanController::class, 'reset'])->name('pengajuan-baru.reset');
    // pengajuan diterima

    Route::get('/pengajuan-baru', [PengajuanPimpinanController::class, 'index'])->name('pengajuan-baru.index');
    Route::get('/pengajuan-baru-terima', [PengajuanPimpinanController::class, 'indexTerima'])->name('pengajuan-baru-terima.index');
    Route::get('/pengajuan-baru-tolak', [PengajuanPimpinanController::class, 'indexTolak'])->name('pengajuan-baru-tolak.index');
    Route::get('/pengajuan-baru-arsip', [PengajuanPimpinanController::class, 'indexArsip'])->name('pengajuan-baru-arsip.index');

    Route::get('barang-pimpinan', [BarangPimpinanController::class, 'index'])->name('barang-pimpinan.index');
    Route::get('barang-pimpinan-arsip', [BarangPimpinanController::class, 'arsip'])->name('barang-pimpinan.arsip');
    Route::put('barang-pimpinan-terima/{BarangPimpinan}', [BarangPimpinanController::class, 'updateterima'])->name('barang-pimpinan.terima');
    Route::put('barang-pimpinan-reset/{BarangPimpinan}', [BarangPimpinanController::class, 'reset'])->name('barang-pimpinan.reset');

    Route::put('barang-pimpinan-update/{BarangPimpinan}', [BarangPimpinanController::class, 'updateusulan'])->name('barang-pimpinan.updateusulan');

    Route::post('/upload', [UploadController::class, 'store'])->name('avatar-store');
});

// pendamping
Route::group(['middleware' => ['auth']], function () {
    Route::get('/lansia-pendamping', [LansiaController::class, 'indexPendamping'])->name('lansia-pendamping');
    Route::resource('pengajuan', PengajuanController::class);
    Route::resource('barang', BarangController::class);
});

require __DIR__ . '/auth.php';
