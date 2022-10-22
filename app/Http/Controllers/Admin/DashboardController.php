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
        $dataTransaksi = Transaksi::with('product')->orderBy('id', 'desc')->get();

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
        return view('pages.dashboard.artikel');
    }
}
