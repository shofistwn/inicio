<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $fillable = [
        'user_id',
        'foto',
        'judul',
        'slug',
        'kategori',
        'konten'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
