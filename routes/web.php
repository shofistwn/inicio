<?php

use App\Http\Controllers\{
    HomeController,
    CartController,
    TransaksiController,
    MidtransController,
    ProductController,
    ArtikelController
};
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Models\Artikel;
use App\Models\Transaksi;
use App\Models\UserAddress;
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
    $dataArtikel = Artikel::orderBy('created_at', 'desc')->take(3)->get();
    return view('index', compact('dataArtikel'));
})->name('home');

Auth::routes();

// api rajaongkir
Route::post('/ongkir', [TransaksiController::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [TransaksiController::class, 'getCities']);

// response midtrans
Route::post('/midtrans/notification', [MidtransController::class, 'receive']);

// produk create
Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create')->middleware('role:admin|pegawai');
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create')->middleware('role:admin|pegawai');

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
    Route::get('/profile', [HomeController::class, 'profile'])->name('user.index');
    Route::put('/user', [HomeController::class, 'update'])->name('user.update');

    // cart
    Route::get('/cart', [CartController::class, 'index'])->name('shop.cart');
    Route::post('/cart', [CartController::class, 'store'])->name('shop.store');
    Route::post('/shop/cart', [CartController::class, 'storeCart'])->name('shop.storeCart');
    Route::delete('/cart/delete', [CartController::class, 'destroy'])->name('cart.destroy');

    // checkout
    Route::get('/checkout/{id}', [TransaksiController::class, 'checkout'])->name('shop.checkout');
    Route::get('/checkout', [TransaksiController::class, 'checkout2'])->name('shop.checkout2');

    // payment
    Route::post('/payment/{id}', [TransaksiController::class, 'payment'])->name('payment');
    Route::post('/payment', [TransaksiController::class, 'payment2'])->name('payment2');

    // redirect setelah sukses bayar
    Route::get('/midtrans/finish', function () {
        $transaksi = Transaksi::where('transaksi.user_id', Auth::user()->id)->orderBy('transaksi.created_at', 'desc')
        ->join('products', 'products.id', '=', 'transaksi.product_id')
        ->first();
        $user = UserAddress::where('user_id', Auth::user()->id)
        ->join('provinces', 'provinces.id', '=', 'user_addresses.provinsi')
        ->join('cities', 'cities.id', '=', 'user_addresses.kota')
        ->select('user_addresses.*', 'provinces.name as provinsi', 'cities.name as kota')
        ->first();
        return view('success', compact('transaksi', 'user'));
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
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });

    Route::middleware('role:admin')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/pegawai', [DashboardController::class, 'pegawai'])->name('pegawai');
        Route::delete('/pegawai/{id}', [DashboardController::class, 'hapusPegawai'])->name('hapusPegawai');
        Route::get('/artikel', [DashboardController::class, 'artikel'])->name('artikel');
        Route::delete('/artikel/{id}', [DashboardController::class, 'hapusArtikel'])->name('hapusArtikel');
        Route::get('/produk', [DashboardController::class, 'produk'])->name('produk');
        Route::delete('/produk/{id}', [DashboardController::class, 'hapusProduk'])->name('hapusProduk');
    });

    Route::middleware('role:pegawai')->prefix('pegawai')->name('pegawai.')->group(function () {
        Route::get('/', [PegawaiDashboardController::class, 'index'])->name('index');
        Route::get('/artikel', [PegawaiDashboardController::class, 'artikel'])->name('artikel');
        Route::delete('/artikel/{id}', [PegawaiDashboardController::class, 'hapusArtikel'])->name('hapusArtikel');
        Route::get('/produk', [PegawaiDashboardController::class, 'produk'])->name('produk');
        Route::delete('/produk/{id}', [PegawaiDashboardController::class, 'hapusProduk'])->name('hapusProduk');
    });
});
