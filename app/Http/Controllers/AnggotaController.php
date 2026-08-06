<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Http\Resources\AnggotaResource;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        return AnggotaResource::collection(Anggota::all());
    }

    public function show(string $id)
    {
        return new AnggotaResource(Anggota::findOrFail($id));
    }

    public function store(StoreAnggotaRequest $request)
    {
        $anggota = Anggota::create($request->validated());

        return response()->json([
            'message' => 'Anggota berhasil ditambahkan',
            'data' => new AnggotaResource($anggota),
        ], 201);
    }

    public function update(UpdateAnggotaRequest $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->validated());

        return response()->json([
            'message' => 'Anggota berhasil diupdate',
            'data' => new AnggotaResource($anggota),
        ]);
    }

    public function destroy(string $id)
    {
        Anggota::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Anggota berhasil dihapus',
        ]);
    }
}
