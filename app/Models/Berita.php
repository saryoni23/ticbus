<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    public $table = 'tbl_berita';
    protected $fillable = [
        'image',
        'judul',
        'isi',
        'is_active',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
