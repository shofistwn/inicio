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
        'obat_id',
        'nama_penerima',
        'telepon',
        'provinsi',
        'kota',
        'kecamatan',
        'alamat_detail',
        'no_resi',
        'kode_pos',
        'jasa_ekspedisi',
        'harga_obat',
        'berat_obat',
        'jumlah_pesanan',
        'ongkos_kirim',
        'total_pembayaran',
        'status_pembayaran',
    ];
}