<?php
namespace App\Services;
use App\Models\Komik;
use App\Models\Peminjaman;
use Exception;
class PeminjamanService
{
 public function pinjam(array $data): Peminjaman {
    $komik = Komik::findOrFail($data['komik_id']);
        if ($komik->stok < 1) {
            throw new Exception('Stok komik habis, tidak bisa dipinjam');
        }
        $peminjaman = Peminjaman::create([
            'anggota_id' => $data['anggota_id'],
            'komik_id' => $data['komik_id'],
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
        ]);

        $komik->decrement('stok');
        return $peminjaman;
    }
}
