<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'anggota_id',
        'komik_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];


    public function anggota(): BelongsTo
    {
        return $this->belongsTo(Anggota::class);
    }


    public function komik(): BelongsTo
    {
        return $this->belongsTo(Komik::class);
    }
}
