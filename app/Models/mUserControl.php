<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mUserControl extends Model
{
    use HasFactory;
    public $table = 'users';
    public $filltable = [
        'id',
        'fullname',
        'email',
        'role',
        'nomor',
        'gambar',
    ];
}
