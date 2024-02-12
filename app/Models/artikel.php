<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    public $table = 'tbl_artikel';
    public $filltable = [
        'id',
        'judul',
        'isi',
        'image',
        'is_active',
        'created_at	',
        'updated_at',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
