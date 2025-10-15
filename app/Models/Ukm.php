<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    protected $table = 'ukm';

    protected $fillable = [
        'nama_ukm',
        'deskripsi',
        'user_id', // foreign key ke user (admin pembuat UKM)
    ];

    // Relasi: UKM dibuat oleh satu user (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: UKM punya banyak anggota
    public function anggota()
    {
        return $this->hasMany(AnggotaUkm::class);
    }
}
