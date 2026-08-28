<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Http\Resources\AnggotaResource;
use App\Services\AnggotaService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class AnggotaController extends Controller
{
    use ApiResponse; 

    protected AnggotaService $anggotaService;

    public function __construct(AnggotaService $anggotaService)
    {
        $this->anggotaService = $anggotaService;
    }

    public function index(): JsonResponse
    {
        $anggotas = $this->anggotaService->index();
        return $this->successResponse(AnggotaResource::collection($anggotas), 'Daftar anggota berhasil diambil.');
    }

    public function store(StoreAnggotaRequest $request): JsonResponse
    {
        $anggota = $this->anggotaService->store($request->validated());
        return $this->successResponse(new AnggotaResource($anggota), 'Anggota berhasil ditambahkan.', 201);
    }

    public function show(string $id): JsonResponse
    {
        $anggota = $this->anggotaService->show($id);
        return $this->successResponse(new AnggotaResource($anggota), 'Detail anggota berhasil diambil.');
    }

    public function update(UpdateAnggotaRequest $request, string $id): JsonResponse
    {
        $anggota = $this->anggotaService->update($id, $request->validated());
        return $this->successResponse(new AnggotaResource($anggota), 'Anggota berhasil diperbarui.');
    }

    public function destroy(string $id): JsonResponse
    {
        $this->anggotaService->destroy($id);
        return $this->successResponse(null, 'Anggota berhasil dihapus.');
    }
}
