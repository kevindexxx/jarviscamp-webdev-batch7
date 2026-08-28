<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Http\Resources\PeminjamanResource;
use App\Services\PeminjamanService;
use App\Traits\ApiResponse;
use DomainException;
use RuntimeException;

class PeminjamanController extends Controller
{
    use ApiResponse;

    public function __construct(protected PeminjamanService $peminjamanService) {}

    public function index()
    {
        $peminjaman = $this->peminjamanService->index();
        return $this->success(PeminjamanResource::collection($peminjaman), 'Daftar peminjaman berhasil diambil.');
    }

    public function store(StorePeminjamanRequest $request)
    {
        try {
            $peminjaman = $this->peminjamanService->store($request->validated());
            return $this->success(new PeminjamanResource($peminjaman), 'Peminjaman berhasil dicatat.', 201);
        } catch (RuntimeException $e) {
        
            return $this->error($e->getMessage(), 400);
        }
    }

    public function show(string $id)
    {
        $peminjaman = $this->peminjamanService->show($id);
        return $this->success(new PeminjamanResource($peminjaman), 'Detail peminjaman berhasil diambil.');
    }

    public function update(UpdatePeminjamanRequest $request, string $id)
    {
        $peminjaman = $this->peminjamanService->update($id, $request->validated());
        return $this->success(new PeminjamanResource($peminjaman), 'Peminjaman berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $this->peminjamanService->destroy($id);
        return $this->success(null, 'Peminjaman berhasil dihapus.');
    }


    public function kembali(string $id)
    {
        try {
            $peminjaman = $this->peminjamanService->kembali($id);
            return $this->success(new PeminjamanResource($peminjaman), 'Pengembalian komik berhasil.');
        } catch (DomainException $e) {
            return $this->error($e->getMessage(), 400);
        }
    }
}
