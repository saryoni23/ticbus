<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    public $table = 'tbl_transaksi';
    public $filltable = [
        'id',
        'code_booking',
        'nama_user',
        'total_qty',
        'no_kursi',
        'tgl_pergi',
        'total_harga',
        'id_user',
        'id_rute',
        'waktu_pesan',
        'status',
    ];
    protected $hidden;
}
