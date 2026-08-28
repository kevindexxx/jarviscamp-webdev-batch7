<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;
use App\Services\KomikService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class KomikController extends Controller
{
    use ApiResponse;

    protected KomikService $komikService;

    public function __construct(KomikService $komikService)
    {
        $this->komikService = $komikService;
    }

    public function index(): JsonResponse
    {
        $komiks = $this->komikService->index();
        return $this->successResponse(KomikResource::collection($komiks), 'Daftar komik berhasil diambil.');
    }

    public function store(StoreKomikRequest $request): JsonResponse
    {
        $data = $request->validated();
        if ($request->hasFile('file_pdf')) {
            $path = $request->file('file_pdf')->store('komik_pdf', 'public');
            $data['file_pdf'] = $path;
        }
        $komik = $this->komikService->store($data);
        return $this->successResponse(new KomikResource($komik), 'Komik berhasil ditambahkan.', 201);
    }

    public function show(string $id): JsonResponse
    {
        $komik = $this->komikService->show($id);
        return $this->successResponse(new KomikResource($komik), 'Detail komik berhasil diambil.');
    }

    public function update(UpdateKomikRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        if ($request->hasFile('file_pdf')) {
            $path = $request->file('file_pdf')->store('komik_pdf', 'public');
            $data['file_pdf'] = $path;
        }
        $komik = $this->komikService->update($id, $data);
        return $this->successResponse(new KomikResource($komik), 'Komik berhasil diperbarui.');
    }

    public function destroy(string $id): JsonResponse
    {
        $this->komikService->destroy($id);
        return $this->successResponse(null, 'Komik berhasil dihapus.');
    }
}
