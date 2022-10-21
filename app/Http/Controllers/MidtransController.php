<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Midtrans\CallbackService;

class MidtransController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        // if ($callback->isSignatureKeyVerified()) {
        $notification = $callback->getNotification();
        $order = $callback->getOrder();
        $transaksi = Transaksi::orderBy('id', 'DESC')->first();

        if ($callback->isSuccess()) {
            $transaksi->update([
                'status_pembayaran' => 2,
            ]);
        }

        if ($callback->isExpire()) {
            $transaksi->update([
                'status_pembayaran' => 3,
            ]);
        }

        if ($callback->isCancelled()) {
            $transaksi->update([
                'status_pembayaran' => 4,
            ]);
        }

        return response()
            ->json([
                'success' => true,
                'message' => 'Notifikasi berhasil diproses',
            ]);
        // } else {
        //     return response()
        //         ->json([
        //             'error' => true,
        //             'message' => 'Signature key tidak terverifikasi',
        //         ], 403);
        // }
    }
}
