<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    public $table = 'tbl_home';
    protected $fillable = [
        'tulisan_depan',
        'isi',
    ];
}
