<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LaporanBarangKeluarController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;
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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('password-hash', function () {
    return Hash::make('12345678');
});

//dashboard admin
Route::get('/admin/dashboard', [KaryawanController::class, 'index'])->name('admin.dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/tabel', [AdminController::class, 'tabelowner'])->name('admin.tabelowner');
    Route::get('/tambah', [AdminController::class, 'tambahowner'])->name('admin.tambahowner');
    Route::post('/owner', [AdminController::class, 'storeowner'])->name('admin.storeowner');
    Route::get('/edit/{id}/edit', [AdminController::class, 'editowner'])->name('admin.editowner');
    Route::put('/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [AdminController::class, 'hapus_data'])->name('admin.hapus_data');
    Route::get('/barangmasuk', [AdminController::class, 'tabelBarangMasuk'])->name('admin.barang_masuk');
    Route::get('/barangkeluar', [AdminController::class, 'tabelBarangKeluar'])->name('admin.barang_keluar');
    Route::get('/laporanbarangmasuk', [LaporanBarangMasukController::class, 'laporan_barangmasuk'])->name('admin.laporan_barangmasuk');
    Route::get('/laporanbarangkeluar', [LaporanBarangKeluarController::class, 'laporan_barangkeluar'])->name('admin.laporan_barangkeluar');
    Route::get('/logout', [AdminController::class, 'logoutadmin'])->name('admin.logout');

    Route::get('/editakun/{id}', [AdminController::class, 'editakun'])->name('admin.editakun');
    Route::put('/updateakun/edit/{id}', [AdminController::class, 'updateakun'])->name('admin.updateakun');

    Route::get('/profile', [AdminController::class, 'showprofile'])->name('admin.showprofile');
    Route::get('editadmin/{id}', [AdminController::class, 'editadmin'])->name('admin.editadmin');
    Route::put('/editadmin/{id}', [AdminController::class, 'updateadmin'])->name('admin.updateadmin');
});

Route::get('/admin/download-pdf-bm', [AdminController::class, 'cetakbm'])->name('admin.cetaklaporanbm');
Route::get('/admin/download-pdf-bk', [AdminController::class, 'cetakbk'])->name('admin.cetaklaporanbk');


Route::get('/pegawai/dashboard', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
Route::get('/pegawai/barangmasuk', [PegawaiController::class, 'tabelBarangMasuk'])->name('pegawai.tabelBarangMasuk');
Route::get('/pegawai/barangkeluar', [PegawaiController::class, 'tabelBarangKeluar'])->name('pegawai.tabelBarangKeluar');
Route::get('/pegawai/tambahbarangmasuk', [PegawaiController::class, 'tambahBarangMasuk'])->name('pegawai.tambahBarangMasuk');
Route::post('/pegawai/storeBarangMasuk', [PegawaiController::class, 'storeBarangMasuk'])->name('pegawai.storeBarangMasuk');
Route::get('/pegawai/tambahbarangkeluar', [PegawaiController::class, 'tambahBarangKeluar'])->name('pegawai.tambahBarangKeluar');
Route::post('/pegawai/storeBarangKeluar', [PegawaiController::class, 'storeBarangKeluar'])->name('pegawai.storeBarangKeluar');
Route::get('/pegawai/cekstock/{kode_barang}', [PegawaiController::class, 'cekStock'])->name('pegawai.cekStock');
Route::get('/pegawai/autocomplete/{id}', [PegawaiController::class, 'autocomplete'])->name('pegawai.autocomplete');

//edit barang masuk
// Route::get('/edit/{id}/edit', [PegawaiController::class, 'editBarangMasuk'])->name('pegawai.edit_barangmasuk');
Route::get('pegawai/edit-barang-masuk/{id}', [PegawaiController::class, 'editBarangMasuk'])->name('pegawai.editBarangMasuk');
Route::put('/edit-barang-masuk/{id}', [PegawaiController::class, 'updateBarangMasuk'])->name('pegawai.updateBarangMasuk');
// Route::put('/edit/{id}', [PegawaiController::class, 'updateBarangMasuk'])->name('pegawai.updateBarangMasuk');

//edit barang keluar
Route::get('pegawai/edit-barang-keluar/{id}', [PegawaiController::class, 'editBarangKeluar'])->name('pegawai.editBarangkeluar');
Route::put('/edit-barang-keluar/{id}', [PegawaiController::class, 'updateBarangKeluar'])->name('pegawai.updateBarangKeluar');

//logout
Route::get('/pegawai/logout', [PegawaiController::class, 'logoutpegawai'])->name('pegawai.logout');
Route::get('/pegawai/profile', [PegawaiController::class, 'showprofile'])->name('pegawai.showprofile');
Route::get('/pegawaieditpegawai/{id}', [PegawaiController::class, 'editpegawai'])->name('pegawai.editpegawai');
Route::put('/pegawai/editpegawai/{id}', [PegawaiController::class, 'updatepegawai'])->name('pegawai.updatepegawai');
Route::delete('/pegawai/delete/{id}', [PegawaiController::class, 'hapus_dataMasuk'])->name('pegawai.hapus_dataMasuk');




Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
Route::get('/Owner/LaporanBarangMasuk', [OwnerController::class, 'tabelBarangMasuk'])->name('owner.tabelBarangMasuk');
Route::get('/Owner/LaporanBarangKeluar', [OwnerController::class, 'tabelBarangKeluar'])->name('owner.tabelBarangKeluar');
Route::get('/owner/download-pdf-bm', [OwnerController::class, 'cetakbm'])->name('owner.cetaklaporanbm');
Route::get('/owner/download-pdf-bk', [OwnerController::class, 'cetakbk'])->name('owner.cetaklaporanbk');
//logout
Route::get('/owner/logout', [OwnerController::class, 'logoutowner'])->name('owner.logout');

Route::get('/owner/profile', [ownerController::class, 'showprofile'])->name('owner.showprofile');
Route::get('/ownereditowner/{id}', [ownerController::class, 'editowner'])->name('owner.editowner');
Route::put('/owner/editowner/{id}', [ownerController::class, 'updateowner'])->name('owner.updateowner');


//login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('login');
