<?php

use App\Http\Controllers\{
    BlogController,
    TransaksiController,
    EventController,
    ObatController,
    MidtransController
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});
Route::get('/shop', function () {
    return view('pages.shop.index');
})->name('shop.index');
Route::get('/cart', function () {
    return view('pages.shop.cart');
})->name('shop.cart');

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

Route::post('/ongkir', [TransaksiController::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [TransaksiController::class, 'getCities']);
Route::post('/midtrans/notification', [MidtransController::class, 'receive']);

Route::middleware('auth')->group(function () {
    Route::resource('/blog', BlogController::class);
    Route::resource('/event', EventController::class);
    Route::resource('/obat', ObatController::class);

    Route::get('/checkout', [TransaksiController::class, 'checkout']);
    Route::post('/payment', [TransaksiController::class, 'payment'])->name('payment');
    Route::get('/midtrans/finish', function () {
        echo 'finish';
    });

    Route::middleware('role:admin')->group(function () {
    });

    Route::middleware('role:pegawai')->group(function () {
    });

    Route::middleware('role:pelanggan')->group(function () {
    });
});
