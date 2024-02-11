<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;
    public $table = 'tbl_tic';
    public $filltable = [
        'name_tiket',
        'jenis_tiket',
        'harga_tiket',
        // 'id_rutes',
        'kategori_id',
        'jumlah_tiket',
    ];
    public function kategori()
    {
        return $this->belongsTo(categori::class, 'kategori_id');
    }
}
