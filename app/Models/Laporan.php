<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';

    protected $fillable = [
        'user_id',
        'judul_laporan',
        'deskripsi',
        'kategori',
        'kecamatan',
        'status',
        'urgensi',
        'latitude',
        'longitude',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
