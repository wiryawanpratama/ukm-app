<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoLomba extends Model
{
    use HasFactory;

    protected $table = 'info_lomba';

    protected $fillable = [
        'nama_lomba',
        'tipe',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi'
    ];
}
