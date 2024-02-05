<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    public $table = 'tbl_berita';
    public $filltable = [
        'id_berita',
        'judul',
        'isi',
        'image',
        'is_active',
        'created_at	',
        'updated_at',
    ];
}
