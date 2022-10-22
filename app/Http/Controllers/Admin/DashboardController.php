<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Role::withCount('users')->where('name', 'pegawai')->first()->users_count;
        $produkTerjual = Transaksi::sum('jumlah_pesanan');
        $produk = Product::count();
        $artikel = Artikel::count();
        // $dataTransaksi = Transaksi::with('product')->orderBy('id', 'desc')->get();
        $dataTransaksi = Transaksi::join('products', 'products.id', '=', 'transaksi.product_id')->orderBy('transaksi.id', 'desc')->get();
        // return response()->json($dataTransaksi);

        return view('pages.dashboard.index', compact('pegawai', 'produkTerjual', 'produk', 'artikel', 'dataTransaksi'));
    }

    public function pegawai()
    {
        $pegawai = Role::with('users')->where('name', 'pegawai')->first();
        return view('pages.dashboard.pegawai', compact('pegawai'));
    }

    public function hapusPegawai($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('dashboard.pegawai');
    }

    public function artikel()
    {
        $dataArtikel = Artikel::all();
        return view('pages.dashboard.artikel', compact('dataArtikel'));
    }

    public function hapusArtikel($id)
    {
        Artikel::find($id)->delete();
        return redirect()->route('dashboard.artikel');
    }

    public function produk()
    {
        $dataProduk = Product::all();
        return view('pages.dashboard.produk', compact('dataProduk'));
    }

    public function hapusProduk($id)
    {
        Product::find($id)->delete();
        return redirect()->route('dashboard.produk');
    }
}
