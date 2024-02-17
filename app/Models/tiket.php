<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = 'tbl_tiket';
    protected $fillable = [
        'name_tiket',
        'nama_supir',
        'harga_tiket',
        'categori_id',
        'rute_id',
        'jumlah_tiket',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'categori_id');
    }
    public function rute()
    {
        return $this->belongsTo(Rute::class, 'rute_id');
    }
}
