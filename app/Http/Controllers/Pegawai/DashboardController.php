<?php

namespace App\Http\Controllers\Pegawai;

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
        $produk = Product::count();
        $artikel = Artikel::count();

        return view('pages.dashboard.pegawai.index', compact('produk', 'artikel'));
    }

    public function artikel()
    {
        $dataArtikel = Artikel::where('user_id', auth()->user()->id)->get();
        return view('pages.dashboard.pegawai.artikel', compact('dataArtikel'));
    }

    public function hapusArtikel($id)
    {
        Artikel::find($id)->delete();
        return redirect()->route('dashboard.artikel');
    }

    public function produk()
    {
        $dataProduk = Product::where('user_id', auth()->user()->id)->get();
        return view('pages.dashboard.pegawai.produk', compact('dataProduk'));
    }

    public function hapusProduk($id)
    {
        Product::find($id)->delete();
        return redirect()->route('dashboard.produk');
    }
}
