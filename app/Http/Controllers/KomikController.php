<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use Illuminate\Http\Request;

class KomikController extends Controller
{
    public function index()
    {
        return Komik::all();
    }

    public function show(string $id)
    {
        return Komik::findOrFail($id);
    }

    public function store(Request $request)
    {
        $komik = Komik::create($request->all());
        return response()->json([
            'message' => 'Komik berhasil ditambahkan',
            'data' => $komik,
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $komik = Komik::findOrFail($id);
        $komik->update($request->all());
        return response()->json([
            'message' => 'Komik berhasil diupdate',
            'data' => $komik,
        ]);
    }

    public function destroy(string $id)
    {
        Komik::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Komik berhasil dihapus'
        ]);
    }
}
