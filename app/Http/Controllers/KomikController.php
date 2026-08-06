<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;
use App\Models\Komik;

class KomikController extends Controller
{
    public function index()
    {
        return KomikResource::collection(Komik::all());
    }

    public function show(string $id)
    {
        return new KomikResource(Komik::findOrFail($id));
    }

    public function store(StoreKomikRequest $request)
    {
        $komik = Komik::create($request->validated());

        return response()->json([
            'message' => 'Komik berhasil ditambahkan',
            'data' => new KomikResource($komik),
        ], 201);
    }

    public function update(UpdateKomikRequest $request, string $id)
    {
        $komik = Komik::findOrFail($id);
        $komik->update($request->validated());

        return response()->json([
            'message' => 'Komik berhasil diupdate',
            'data' => new KomikResource($komik),
        ]);
    }

    public function destroy(string $id)
    {
        Komik::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Komik berhasil dihapus',
        ]);
    }
}
