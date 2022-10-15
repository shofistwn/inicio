<?php

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
