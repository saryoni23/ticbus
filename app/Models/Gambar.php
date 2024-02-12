<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    public $table = 'tbl_gambar';
    public $filltable = [
        'id',
        'nama_gambar',
        'profil_id'
    ];
}
