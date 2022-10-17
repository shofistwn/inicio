<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\Redirect;
use Midtrans\Config;
use Midtrans\Snap;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => time(),
                'gross_amount' => 10000,
            ],
            'customer_details' => [
                'first_name' => 'Andri',
                'last_name' => 'Setiawan',
                'email' => 'user@mail.com',
            ],
            'enabled_payments' => ['shopeepay', 'bank_transfer'],
            'vtweb' => []
        ];

        try {
            $paymentURL = Snap::createTransaction($midtrans_params)->redirect_url;

            return Redirect::to($paymentURL);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
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
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => time(),
                'gross_amount' => $request->total_pembayaran,
            ],
            'customer_details' => [
                'first_name' => 'Andri',
                'last_name' => 'Setiawan',
                'email' => 'user@mail.com',
            ],
            'enabled_payments' => ['shopeepay', 'bank_transfer'],
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
