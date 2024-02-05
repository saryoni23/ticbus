<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rute extends Model
{
    use HasFactory;
    public $table = 'tbl_rute';
    public $filltable = [
        'id_rute',
        'kota_asal',
        'kota_tujuan',
        'jam_berangkat',
        'jam_tiba',
        'kelas',
        'seat',
        'tarif',
        'is_active',
    ];
    protected $hidden;
}
