<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'foto',
        'judul',
        'slug',
        'lokasi',
        'konten',
        'mulai',
        'selesai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
