<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\Province;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\Redirect;
use Midtrans\Config;
use Midtrans\Snap;

class TransaksiController extends Controller
{
    public function ongkir()
    {
        $provinces = Province::pluck('name', 'province_id');
        return view('ongkir', compact('provinces'));
    }

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

    public function checkout()
    {
        $user = User::findOrFail(auth()->user()->id);
        $provinces = Province::pluck('name', 'province_id');
        return view('pages.shop.checkout', compact('user', 'provinces'));
    }

    public function payment(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required',
            'telepon' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat_detail' => 'required',
            'kode_pos' => 'required',
            'jasa_ekspedisi' => 'required',
            'jumlah_pesanan' => 'required',
            'ongkos_kirim' => 'required',
            'total_pembayaran' => 'required',
        ]);

        $request['user_id'] = auth()->user()->id;
        $request['obat_id'] = auth()->user()->id;
        $request['harga_obat'] = auth()->user()->id;
        $request['berat_obat'] = auth()->user()->id;

        Transaksi::create([
            'user_id' => $request->user_id,
            'obat_id' => $request->obat_id,
            'nama_penerima' => $request->nama_penerima,
            'telepon' => $request->telepon,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat_detail' => $request->alamat_detail,
            'kode_pos' => $request->kode_pos,
            'jasa_ekspedisi' => $request->jasa_ekspedisi,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'harga_obat' => $request->harga_obat,
            'berat_obat' => $request->berat_obat,
            'ongkos_kirim' => $request->ongkos_kirim,
            'total_pembayaran' => $request->total_pembayaran,
        ]);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $transaksi = Transaksi::orderBy('id', 'DESC')->first()->id;
        $transaksi += 1;
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'INV-' . $transaksi,
                'gross_amount' => $request->total_pembayaran,
            ],
            'customer_details' => [
                'first_name' => 'Andri',
                'last_name' => 'Setiawan',
                'email' => 'user@mail.com',
            ],
            // 'enabled_payments' => ['shopeepay', 'bank_transfer'],
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
