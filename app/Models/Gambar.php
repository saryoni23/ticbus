<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;
    public $table = 'tbl_gambar';
    protected $fillable = [
        'image',
        'profil_id'
    ];
    public function Profil()
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }
}
