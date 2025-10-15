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
        'angkatan',
        'jenis_kelamin',
        'no_hp',
        'email',
        'alamat',
        'foto',
        'ukm_id',
    ];

    // Relasi ke UKM
    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
