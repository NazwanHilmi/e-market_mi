<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\Auth;

Route::get('/', [HomeController::class, 'index'] );
Route::get('contact', [HomeController::class, 'contact'] );
Route::get('profile', [HomeController::class, 'profile'] );
Route::get('login', [UserController::class, 'index'] )->name('login');
Route::post('login/cek', [UserController::class, 'cekLogin'] )->name('cekLogin');
Route::get('logout', [UserController::class, 'logout'] )->name('logout');
Route::resource('produk', ProdukController::class );
Route::resource('barang', BarangController::class );
Route::resource('pelanggan', PelangganController::class );
Route::resource('pemasok', PemasokController::class );
Route::resource('pembelian', PembelianController::class );
Route::get('users/export/', [UserController::class, 'export']);
Route::get('users/export/', [UsersController::class, 'export']);
Route::get('download', [ProdukController::class, 'download'])->name('download-pdf');
Route::get('export', [ProdukController::class, 'exportData'])->name('export-produk');

// Route::get('pembelian/pdf/{invoice}', 'PembelianController@pdf')->name('customer.order_pdf');

