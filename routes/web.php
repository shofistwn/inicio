<?php

use App\Http\Controllers\{
    HomeController,
    CartController,
    TransaksiController,
    MidtransController,
    ProductController,
    ArtikelController
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
    return view('index');
})->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('admin-page', function () {
//     return 'Halaman untuk admin';
// })->middleware('role:admin')->name('admin.page');

// Route::get('pegawai-page', function () {
//     return 'Halaman untuk pegawai';
// })->middleware('role:pegawai')->name('pegawai.page');

// Route::get('pelanggan-page', function () {
//     return 'Halaman untuk pelanggan';
// })->middleware('role:pelanggan')->name('pelanggan.page');

// api rajaongkir
Route::post('/ongkir', [TransaksiController::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [TransaksiController::class, 'getCities']);

// response midtrans
Route::post('/midtrans/notification', [MidtransController::class, 'receive']);

// produk create
Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create')->middleware('role:admin|pegawai');

// shop
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/search', [ProductController::class, 'search'])->name('shop.search');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

// hanya user yang memiliki telah login yang dapat mengakses halaman ini
Route::middleware('auth')->group(function () {
    // user
    Route::get('/user', [HomeController::class, 'edit'])->name('user.profile');
    Route::put('/user', [HomeController::class, 'update'])->name('user.update');
    
    // cart
    Route::get('/cart', [CartController::class, 'index'])->name('shop.cart');
    Route::post('/cart', [CartController::class, 'store'])->name('shop.store');
    Route::delete('/cart/delete', [CartController::class, 'destroy'])->name('cart.destroy');
    
    // checkout
    Route::get('/checkout/{id}', [TransaksiController::class, 'checkout'])->name('shop.checkout');
    Route::get('/checkout', [TransaksiController::class, 'checkout2'])->name('shop.checkout2');

    // payment
    Route::post('/payment/{id}', [TransaksiController::class, 'payment'])->name('payment');
    Route::post('/payment', [TransaksiController::class, 'payment2'])->name('payment2');

    // redirect setelah sukses bayar
    Route::get('/midtrans/finish', function () {
        echo 'finish';
    });

    // hanya user yang memiliki role admin dan pegawai yang dapat mengakses halaman ini
    Route::middleware('role:admin|pegawai')->group(function () {
        // produk
        Route::controller(ProductController::class)
            ->prefix('produk')
            ->name('produk.')
            ->group(function () {
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        // artikel
        Route::controller(ArtikelController::class)
            ->prefix('artikel')
            ->name('artikel.')
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });

    Route::middleware('role:admin')->group(function () {
    });

    Route::middleware('role:pegawai')->group(function () {
    });
});
