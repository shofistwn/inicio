<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\{
    Cart,
    City,
    ModelHasRoles,
    produk,
    Product,
    Province,
    Transaksi,
    User,
    UserAddress
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\Redirect;
use Midtrans\Config;
use Midtrans\Snap;
use Psy\CodeCleaner\ReturnTypePass;

class TransaksiController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        return response()->json($cost);
    }

    public function checkout($id)
    {
        $product = Product::find($id);

        $user = User::where('id', auth()->user()->id)->with('user_address')->first()->toArray();
        $userAddress = UserAddress::where('user_id', $user['id'])->first();

        if (!isset($user['user_address'])) {
            if (!isset($userAddress)) {
                $user['user_address']['provinsi'] = null;
                $user['user_address']['kota'] = null;
                $user['user_address']['kecamatan'] = null;
                $user['user_address']['alamat_detail'] = null;
                $user['user_address']['kode_pos'] = null;
            } else {
                $user['user_address']['provinsi'] = $userAddress->provinsi;
                $user['user_address']['kota'] = $userAddress->kota;
                $user['user_address']['kecamatan'] = $userAddress->kecamatan;
                $user['user_address']['alamat_detail'] = $userAddress->alamat_detail;
                $user['user_address']['kode_pos'] = $userAddress->kode_pos;
            }
        }

        $provinces = Province::pluck('name', 'province_id');
        $city = City::where('province_id', $user['user_address']['provinsi'])->pluck('name', 'city_id');
        return view('pages.shop.checkout', compact('user', 'product', 'provinces', 'city'));
    }

    public function checkout2()
    {
        $products = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', auth()->user()->id)
            ->get();

        $pesanan = [];
        $total = [];
        $ids = [];
        foreach ($products as $key => $value) {
            $pesanan[$key] = $value->quantity;
            $ids[$key] = $value->id;
            $total[$key] = $value->quantity * $value->harga;
        }
        $subTotal = array_sum($total);

        $user = User::where('id', auth()->user()->id)->with('user_address')->first()->toArray();
        $userAddress = UserAddress::where('user_id', $user['id'])->first();

        if (!isset($user['user_address'])) {
            if (!isset($userAddress)) {
                $user['user_address']['provinsi'] = null;
                $user['user_address']['kota'] = null;
                $user['user_address']['kecamatan'] = null;
                $user['user_address']['alamat_detail'] = null;
                $user['user_address']['kode_pos'] = null;
            } else {
                $user['user_address']['provinsi'] = $userAddress->provinsi;
                $user['user_address']['kota'] = $userAddress->kota;
                $user['user_address']['kecamatan'] = $userAddress->kecamatan;
                $user['user_address']['alamat_detail'] = $userAddress->alamat_detail;
                $user['user_address']['kode_pos'] = $userAddress->kode_pos;
            }
        }

        $provinces = Province::pluck('name', 'province_id');
        $city = City::where('province_id', $user['user_address']['provinsi'])->pluck('name', 'city_id');
        return view('pages.shop.checkout-2', compact('user', 'subTotal', 'ids', 'pesanan', 'provinces', 'city'));
    }

    public function payment(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'alamat_detail' => 'required',
            'kode_pos' => 'required',
            'jasa_ekspedisi' => 'required',
            'jumlah_pesanan' => 'required',
            'ongkos_kirim' => 'required',
            'total_pembayaran' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $product = Product::find($id);
        $request['user_id'] = $user->id;

        Transaksi::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'jasa_ekspedisi' => $request->jasa_ekspedisi,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'subtotal' => $request->jumlah_pesanan * $product->harga,
            'ongkos_kirim' => $request->ongkos_kirim,
            'total_pembayaran' => $request->total_pembayaran,
        ]);

        $userAddress = UserAddress::where('user_id', auth()->user()->id)->first();
        if (isset($userAddress)) {
            $userAddress->update([
                'user_id' => $user->id,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'alamat_detail' => $request->alamat_detail,
                'kode_pos' => $request->kode_pos,
            ]);
        } else {
            UserAddress::create([
                'user_id' => $user->id,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'alamat_detail' => $request->alamat_detail,
                'kode_pos' => $request->kode_pos,
            ]);
        }

        $user->update([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
        ]);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $transaksi = Transaksi::orderBy('id', 'DESC')->first()->id;
        $transaksi += 1;
        $nama = explode(" ", $user->nama);
        if (!isset($nama[1])) {
            $nama[1] = '';
        }

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'INV-' . $transaksi . time(),
                'gross_amount' => $request->total_pembayaran,
            ],
            'customer_details' => [
                'first_name' => $nama[0],
                'last_name' => $nama[1],
                'email' => auth()->user()->email,
            ],
            'vtweb' => []
        ];

        try {
            $paymentURL = Snap::createTransaction($midtrans_params)->redirect_url;

            return Redirect::to($paymentURL);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function payment2(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'nama' => 'required',
            'telepon' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'alamat_detail' => 'required',
            'kode_pos' => 'required',
            'jasa_ekspedisi' => 'required',
            'jumlah_pesanan' => 'required',
            'ongkos_kirim' => 'required',
            'total_pembayaran' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $request['user_id'] = $user->id;

        foreach ($request['ids'] as $key => $id) {
            $product = Product::find($id);

            Transaksi::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'jasa_ekspedisi' => $request->jasa_ekspedisi,
                'jumlah_pesanan' => $request['jumlah_pesanan'][$key],
                'subtotal' => $request['jumlah_pesanan'][$key] * $product->harga,
                'ongkos_kirim' => $request->ongkos_kirim,
                'total_pembayaran' => $request->total_pembayaran,
            ]);
        }

        $userAddress = UserAddress::where('user_id', auth()->user()->id)->first();
        if (isset($userAddress)) {
            $userAddress->update([
                'user_id' => $user->id,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'alamat_detail' => $request->alamat_detail,
                'kode_pos' => $request->kode_pos,
            ]);
        } else {
            UserAddress::create([
                'user_id' => $user->id,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'alamat_detail' => $request->alamat_detail,
                'kode_pos' => $request->kode_pos,
            ]);
        }

        $user->update([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
        ]);

        Cart::where('user_id', $user->id)->delete();

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $transaksi = Transaksi::orderBy('id', 'DESC')->first()->id;
        $transaksi += 1;
        $nama = explode(" ", $user->nama);
        if (!isset($nama[1])) {
            $nama[1] = '';
        }
        
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'INV-' . $transaksi . time(),
                'gross_amount' => $request->total_pembayaran,
            ],
            'customer_details' => [
                'first_name' => $nama[0],
                'last_name' => $nama[1],
                'email' => auth()->user()->email,
            ],
            'vtweb' => []
        ];

        try {
            $paymentURL = Snap::createTransaction($midtrans_params)->redirect_url;

            return Redirect::to($paymentURL);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
