<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // contoh: 'admin' atau 'anggota'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi: satu user bisa punya banyak UKM
    public function ukm()
    {
        return $this->hasMany(Ukm::class);
    }

    // Relasi: jika user adalah anggota UKM
    public function anggotaUkm()
    {
        return $this->hasOne(AnggotaUkm::class);
    }
}
