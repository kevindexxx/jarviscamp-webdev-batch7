<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;
use App\Services\KomikService;
use App\Traits\ApiResponse;

class KomikController extends Controller
{
    use ApiResponse;

    public function __construct(protected KomikService $komikService) {}

    public function index()
    {
        $komiks = $this->komikService->index();
        return $this->success(
            KomikResource::collection($komiks),
            'Daftar komik berhasil diambil.'
        );
    }

    public function store(StoreKomikRequest $request)
    {
        $data = $request->safe()->except('file_pdf');

        if ($request->hasFile('file_pdf')) {
            $data['file_pdf'] = $request->file('file_pdf')->store('komiks', 'public');
        }

        $komik = $this->komikService->store($data);

        return $this->success(new KomikResource($komik), 'Komik berhasil ditambahkan.', 201);
    }

    public function show(string $id)
    {
        $komik = $this->komikService->show($id);
        return $this->success(new KomikResource($komik), 'Detail komik berhasil diambil.');
    }

    public function update(UpdateKomikRequest $request, string $id)
    {
        $data = $request->safe()->except('file_pdf');

        if ($request->hasFile('file_pdf')) {
            $data['file_pdf'] = $request->file('file_pdf')->store('komiks', 'public');
        }

        $komik = $this->komikService->update($id, $data);

        return $this->success(new KomikResource($komik), 'Komik berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $this->komikService->destroy($id);
        return $this->success(null, 'Komik berhasil dihapus.');
    }
}
