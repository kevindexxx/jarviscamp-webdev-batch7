<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return Kategori::all();
    }

    public function show(string $id)
    {
        return Kategori::findOrFail($id);
    }

    public function store(Request $request)
    {
        $kategori = Kategori::create($request->all());
        return response()->json([
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $kategori,
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return response()->json([
            'message' => 'Kategori berhasil diupdate',
            'data' => $kategori,
        ]);
    }

    public function destroy(string $id)
    {
        Kategori::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Kategori berhasil dihapus',
        ]);
    }
}
