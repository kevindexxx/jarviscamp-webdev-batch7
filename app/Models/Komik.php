<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komik extends Model
{
    use HasFactory;
    protected $table = 'Komiks';
    protected $fillable = [
        'judul',
        'penulis',
        'kategori_id',
        'stok',
        'status',
        'file_pdf',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
}
