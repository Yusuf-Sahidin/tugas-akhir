<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TaController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserMahasiswaController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('/admin')->group(function () {
    // Route::middleware('auth')->prefix('/admin')->group(function () {

    Route::get('/', [UserAdminController::class, 'dashboard'])->name('admin'); // halaman depan untuk admin
    //crud admin -> admin
    Route::get('/data_admin', [AdminController::class, 'index'])->name('data_admin');
    Route::get('/admin/tambah', [AdminController::class, 'create'])->name('hal_tambah_admin');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('hal_edit_admin');
    Route::delete('/admin/hapus/{id}', [AdminController::class, 'destroy'])->name('hapus_admin');
    Route::post('/admin/tambah', [AdminController::class, 'store'])->name('tambah_admin');
    Route::patch('/admin/edit/{id}', [AdminController::class, 'update'])->name('edit_admin');

    //crud admin -> mahasiswa
    Route::get('/data_mahasiswa', [MahasiswaController::class, 'index'])->name('data_mahasiswa');
    Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'create'])->name('hal_tambah_mahasiswa');
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('hal_edit_mahasiswa');
    Route::delete('/mahasiswa/hapus/{id}', [MahasiswaController::class, 'destroy'])->name('hapus_mahasiswa');
    Route::post('/mahasiswa/tambah', [MahasiswaController::class, 'store'])->name('tambah_mahasiswa');
    Route::patch('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('edit_mahasiswa');

    //crud admin -> dosen
    Route::get('/data_dosen', [DosenController::class, 'index'])->name('data_dosen');
    Route::get('/dosen/tambah', [DosenController::class, 'create'])->name('hal_tambah_dosen');
    Route::get('/dosen/edit/{id}', [DosenController::class, 'edit'])->name('hal_edit_dosen');
    Route::delete('/dosen/hapus/{id}', [DosenController::class, 'destroy'])->name('hapus_dosen');
    Route::post('/dosen/tambah', [DosenController::class, 'store'])->name('tambah_dosen');
    Route::patch('/dosen/edit/{id}', [DosenController::class, 'update'])->name('edit_dosen');

    //crud admin -> prodi
    Route::get('/data_prodi', [ProdiController::class, 'index'])->name('data_prodi');
    Route::get('/prodi/tambah', [ProdiController::class, 'create'])->name('hal_tambah_prodi');
    Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('hal_edit_prodi');
    Route::delete('/prodi/hapus/{id}', [ProdiController::class, 'destroy'])->name('hapus_prodi');
    Route::post('/prodi/tambah', [ProdiController::class, 'store'])->name('tambah_prodi');
    Route::patch('/prodi/edit/{id}', [ProdiController::class, 'update'])->name('edit_prodi');

    //crud admin -> jurusan
    Route::get('/data_jurusan', [JurusanController::class, 'index'])->name('data_jurusan');
    Route::get('/jurusan/tambah', [JurusanController::class, 'create'])->name('hal_tambah_jurusan');
    Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('hal_edit_jurusan');
    Route::delete('/jurusan/hapus/{id}', [JurusanController::class, 'destroy'])->name('hapus_jurusan');
    Route::post('/jurusan/tambah', [JurusanController::class, 'store'])->name('tambah_jurusan');
    Route::patch('/jurusan/edit/{id}', [JurusanController::class, 'update'])->name('edit_jurusan');

    //crud admin -> periode
    Route::get('/data_periode', [PeriodeController::class, 'index'])->name('data_periode');
    Route::get('/periode/tambah', [PeriodeController::class, 'create'])->name('hal_tambah_periode');
    Route::get('/periode/edit/{id}', [PeriodeController::class, 'edit'])->name('hal_edit_periode');
    Route::delete('/periode/hapus/{id}', [PeriodeController::class, 'destroy'])->name('hapus_periode');
    Route::post('/periode/tambah', [PeriodeController::class, 'store'])->name('tambah_periode');
    Route::patch('/periode/edit/{id}', [PeriodeController::class, 'update'])->name('edit_periode');

    //crud admin -> ruangan
    Route::get('/data_ruangan', [RuanganController::class, 'index'])->name('data_ruangan');
    Route::get('/ruangan/tambah', [RuanganController::class, 'create'])->name('hal_tambah_ruangan');
    Route::get('/ruangan/edit/{id}', [RuanganController::class, 'edit'])->name('hal_edit_ruangan');
    Route::delete('/ruangan/hapus/{id}', [RuanganController::class, 'destroy'])->name('hapus_ruangan');
    Route::post('/ruangan/tambah', [RuanganController::class, 'store'])->name('tambah_ruangan');
    Route::patch('/ruangan/edit/{id}', [RuanganController::class, 'update'])->name('edit_ruangan');
});

Route::prefix('/mahasiswa')->group(function () {
    // Route::middleware('auth')->prefix('/mahasiswa')->group(function () {

    Route::get('/', [UserMahasiswaController::class, 'dashboard'])->name('mahasiswa'); // halaman depan untuk mahasiswa

    //crud mahasiswa -> bimbingan
    Route::get('/bimbingan', [BimbinganController::class, 'index'])->name('bimbingan');
    Route::get('/bimbingan/tambah', [BimbinganController::class, 'create'])->name('hal_tambah_bimbingan');
    Route::get('/bimbingan/edit/{id}', [BimbinganController::class, 'edit'])->name('hal_edit_bimbingan');
    Route::delete('/bimbingan/hapus/{id}', [BimbinganController::class, 'destroy'])->name('hapus_bimbingan');
    Route::post('/bimbingan/tambah', [BimbinganController::class, 'store'])->name('tambah_bimbingan');
    Route::patch('/bimbingan/edit/{id}', [BimbinganController::class, 'update'])->name('edit_bimbingan');
    Route::post('/bimbingan/detail/{id}', [BimbinganController::class, 'show'])->name('detail_bimbingan');

    //crud mahasiswa -> Daftar tugas akhir
    Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');

    Route::get('/ta', [TaController::class, 'create'])->name('ta');
    Route::post('/ta/simpan', [TaController::class, 'store'])->name('simpan_ta');
});
