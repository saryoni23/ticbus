<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categori extends Model
{
    use HasFactory;
    public $table = 'tbl_kategori';
    public $filltable = [
        'id',
        'name_categori',
    ];
}
