<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaUkm extends Model
{
    use HasFactory;

    protected $table = 'anggota_ukm';

    protected $fillable = [
        'nama',
        'nim',
        'prodi',
        'ukm_id', // foreign key
        'user_id', // kalau anggota login juga lewat user
    ];

    // Relasi ke UKM
    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }

    // Relasi ke User (opsional, kalau login)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}