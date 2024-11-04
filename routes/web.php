<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;


Route::get('/', function () {
    return view('welcome');
});


// Halaman utama yang menampilkan daftar pengguna
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');

// Halaman untuk membuat pengguna baru
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');

// Menyimpan pengguna baru ke database
Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');

// Halaman untuk mengedit data pengguna
Route::get('/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');

// Memperbarui data pengguna yang sudah ada
Route::put('/pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');

// Menghapus pengguna dari database
Route::delete('/pengguna/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
