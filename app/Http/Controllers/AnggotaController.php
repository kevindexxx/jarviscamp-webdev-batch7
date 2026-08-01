<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(){
        return Anggota::all();
    }

    public function show(string $id){
        return Anggota::findOrFail($id);
    }

    public function store(Request $request){
        $anggota = Anggota::create($request->all());
        return response()->json([
            'message' => 'Anggota berhasil ditambahkan',
            'data' => $anggota,
        ], 201);
    }

    public function update(Request $request, string $id){
        $anggota = Anggota::findOrFail($id);
        $anggota -> update($request->all());
        return response()->json([
            'message' => 'Anggota berhasil diupdate',
            'data' => $anggota,
        ]);
    }

    public function destroy(string $id){
        Anggota::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Anggota berhasil dihapus  '
        ]);
    }
}
