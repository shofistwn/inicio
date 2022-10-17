<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $fillable = [
        'user_id',
        'slug',
        'foto',
        'nama',
        'kategori',
        'stok',
        'harga',
        'deskripsi',
        'komposisi',
        'dosis',
        'aturan_pakai',
        'manufaktur',
        'berat',
        'no_registrasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
