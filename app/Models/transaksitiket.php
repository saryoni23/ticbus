<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksitiket extends Model
{
    use HasFactory;
    public $table = 'tbl_transaksitiket';
    public $filltable = [
        'tiket_id',
        'qty',
        'status',
    ];
    public function User()
    {

        return $this->belongsTo(User::class, 'user_id');
    }
}
