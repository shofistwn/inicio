<?php

use App\Http\Controllers\{
    BlogController,
    TransaksiController,
    EventController,
    ObatController
};
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin-page', function () {
    return 'Halaman untuk admin';
})->middleware('role:admin')->name('admin.page');

Route::get('pegawai-page', function () {
    return 'Halaman untuk pegawai';
})->middleware('role:pegawai')->name('pegawai.page');

Route::get('pelanggan-page', function () {
    return 'Halaman untuk pelanggan';
})->middleware('role:pelanggan')->name('pelanggan.page');

// Route::resource('/blog', BlogController::class);
// Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/ongkir', [TransaksiController::class, 'index']);
Route::post('/ongkir', [TransaksiController::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [TransaksiController::class, 'getCities']);

Route::middleware('auth')->group(function () {
    Route::resource('/blog', BlogController::class);
    Route::resource('/event', EventController::class);
    Route::resource('/obat', ObatController::class);

    Route::middleware('role:admin')->group(function () {
    });

    Route::middleware('role:pegawai')->group(function () {
    });

    Route::middleware('role:pelanggan')->group(function () {
    });
});
