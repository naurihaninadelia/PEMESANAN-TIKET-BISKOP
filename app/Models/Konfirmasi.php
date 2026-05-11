<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $table = 'konfirmasi';

    protected $fillable = [
        'tanggal',
        'jam_tayang',
        'id_film',
    ];
}
