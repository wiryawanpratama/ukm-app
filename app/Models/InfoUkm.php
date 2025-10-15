<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoUkm extends Model
{
    use HasFactory;

    protected $table = 'info_ukm';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal'
    ];
}
