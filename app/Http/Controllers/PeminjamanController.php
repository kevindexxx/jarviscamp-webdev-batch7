<?php
namespace App\Http\Controllers;
use App\Services\PeminjamanService;
use Illuminate\Http\Request;

class PeminjamanController extends Controller {
    public function __construct(protected PeminjamanService $peminjamanService) {}

    public function store(Request $request) {
        $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'komik_id' => 'required|exists:komiks,id',
        ]);

        $peminjaman = $this->peminjamanService->pinjam($request->all());
        return response()->json([
            'message' => 'Peminjaman berhasil dibuat',
            'data' => $peminjaman,
        ], 201);
    }
}
