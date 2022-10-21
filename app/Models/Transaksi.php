<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'user_id',
        'product_id',
        'no_resi',
        'jasa_ekspedisi',
        'jumlah_pesanan',
        'subtotal',
        'ongkos_kirim',
        'total_pembayaran',
        'status_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
