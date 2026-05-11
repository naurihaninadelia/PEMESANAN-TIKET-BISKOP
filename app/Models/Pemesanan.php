<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'jumlah_tiket',
        'status_pemesanan',
        'id_user',
        'id_jadwal',
    ];
}
