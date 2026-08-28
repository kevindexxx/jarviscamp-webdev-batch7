<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Http\Resources\PeminjamanResource;
use App\Services\PeminjamanService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class PeminjamanController extends Controller
{
    use ApiResponse;

    protected PeminjamanService $peminjamanService;

    public function __construct(PeminjamanService $peminjamanService)
    {
        $this->peminjamanService = $peminjamanService;
    }

    public function index(): JsonResponse
    {
        $peminjamans = $this->peminjamanService->index();
        return $this->successResponse(PeminjamanResource::collection($peminjamans), 'Daftar peminjaman berhasil diambil.');
    }

    public function store(StorePeminjamanRequest $request): JsonResponse
    {
        $peminjaman = $this->peminjamanService->store($request->validated());
        return $this->successResponse(new PeminjamanResource($peminjaman), 'Peminjaman berhasil ditambahkan.', 201);
    }

    public function show(string $id): JsonResponse
    {
        $peminjaman = $this->peminjamanService->show($id);
        return $this->successResponse(new PeminjamanResource($peminjaman), 'Detail peminjaman berhasil diambil.');
    }

    public function update(UpdatePeminjamanRequest $request, string $id): JsonResponse
    {
        $peminjaman = $this->peminjamanService->update($id, $request->validated());
        return $this->successResponse(new PeminjamanResource($peminjaman), 'Peminjaman berhasil diperbarui.');
    }

    public function destroy(string $id): JsonResponse
    {
        $this->peminjamanService->destroy($id);
        return $this->successResponse(null, 'Peminjaman berhasil dihapus.');
    }

    public function kembali(string $id): JsonResponse
    {
        try {
            $peminjaman = $this->peminjamanService->kembali($id);
            return $this->successResponse(new PeminjamanResource($peminjaman), 'Pengembalian komik berhasil.');
        } catch (\Exception $e) {

            return $this->errorResponse($e->getMessage(), 400);
        }
    }
}
