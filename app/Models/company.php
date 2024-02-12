<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    public $table = 'tbl_profilusaha';
    public $filltable = [
        'id',
        'nama_perusahaan',
        'isi',
        'visi',
        'logo',
        'singkatan_namausaha'


    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
