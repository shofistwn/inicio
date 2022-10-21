<?php

use App\Http\Controllers\{
    HomeController,
    BlogController,
    CartController,
    TransaksiController,
    MidtransController,
    ProductController
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
})->name('beranda');

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

// api rajaongkir
Route::post('/ongkir', [TransaksiController::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [TransaksiController::class, 'getCities']);

// response midtrans
Route::post('/midtrans/notification', [MidtransController::class, 'receive']);

// shop
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

Route::controller(ProductController::class)
->prefix('produk')
->name('produk.')
->group(function () {
    // Route::get('/', 'index')->name('index');
    // Route::get('/create', 'create')->name('create');
    // Route::get('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    // Route::get('/{id}/edit', 'edit')->name('edit');
    // Route::put('/{id}', 'update')->name('update');
    // Route::delete('/{id}', 'destroy')->name('destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('/blog', BlogController::class);

    // user
    Route::get('/user', [HomeController::class, 'edit'])->name('user.profile');
    Route::put('/user', [HomeController::class, 'update'])->name('user.update');

    Route::get('/cart', [CartController::class, 'index'])->name('shop.cart');
    Route::post('/cart', [CartController::class, 'store'])->name('shop.store');
    Route::get('/checkout/{id}', [TransaksiController::class, 'checkout'])->name('shop.checkout');
    Route::get('/checkout', [TransaksiController::class, 'checkout2'])->name('shop.checkout2');

    Route::post('/payment/{id}', [TransaksiController::class, 'payment'])->name('payment');
    Route::post('/payment', [TransaksiController::class, 'payment2'])->name('payment2');

    Route::get('/midtrans/finish', function () {
        echo 'finish';
    });

    Route::middleware('role:admin|pegawai')->group(function () {
        Route::controller(ProductController::class)
            ->prefix('produk')
            ->name('produk.')
            ->group(function () {
                // Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/', 'store')->name('store');
                // Route::get('/{id}', 'show')->name('show');
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
