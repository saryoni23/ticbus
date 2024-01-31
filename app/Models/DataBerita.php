<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBerita extends Model
{
    use HasFactory;
    public $table = 'table_databerita';
    public $filltable = [
        'id_berita',
        'judul',
        'isi',
        'image',
        'created_at	',
        'updated_at',
    ];
}
