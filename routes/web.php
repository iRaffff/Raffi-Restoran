<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\AbsensiKerjaController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\TentangAplikasiController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use App\Models\AbsensiKerja;
use App\Models\Kategori;
use App\Models\Transaksi;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route Jenis
Route::resource('/jenis', JenisController::class);
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export-jenis');
Route::post('import/jenis', [JenisController::class, 'importData'])->name('import-jenis');
// Route Menu
Route::resource('/menu', MenuController::class);
Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');
Route::post('import/menu', [MenuController::class, 'importData'])->name('import-menu');
//Route Stok
Route::resource('/stok', StokController::class);
Route::get('export/stok', [StokController::class, 'exportData'])->name('export-stok');
Route::post('import/stok', [StokController::class, 'importData'])->name('import-stok');
// Route Absensi
Route::resource('/absensi_kerja', AbsensiKerjaController::class);
Route::get('export/absensi_kerja', [AbsensiKerjaController::class, 'exportData'])->name('export-absensi_kerja');
Route::post('absensi_kerja/import', [AbsensiKerjaController::class, 'importData'])->name('import-absensi_kerja');
// Route Contact
Route::resource('/contact_us', ContactUsController::class);
// Routee About
Route::resource('/tentang_apk', TentangAplikasiController::class);
// Route Pelanggan
Route::resource('/member', MemberController::class);
Route::get('export/member', [MemberController::class, 'exportData'])->name('export-member');
Route::post('import/member', [MemberController::class, 'importData'])->name('import-member');
// Route Kategori
Route::resource('/kategori', KategoriController::class);
Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
Route::post('import/kategori', [KategoriController::class, 'importData'])->name('import-kategori');
// Route Meja
Route::resource('/meja', MejaController::class);
Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');
Route::post('import/meja', [MejaController::class, 'importData'])->name('import-meja');
//Route Transaksi Pembelian
Route::resource('transaksi', TransaksiController::class);
