<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public $table = 'tbl_transaksi';
    public $filltable = [
        'id',
        'code_booking',
        'nama_user',
        'total_qty',
        'no_kursi',
        'tgl_pergi',
        'total_harga',
        'user_id',
        // 'id_rute',
        'waktu_pesan',
        'status',
    ];
    protected $hidden;
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
