<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    public $table = 'tbl_profilusaha';
    protected $fillable = [
        'nama_perusahaan',
        'isi',
        'visi',
        'logo',
        'singkatan_namausaha',
    ];
}
