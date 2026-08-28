<?php

namespace App\Services;

use App\Models\Komik;
use Illuminate\Database\Eloquent\Collection;

class KomikService
{
    public function index(): Collection
    {
        return Komik::with('kategori')->get();
    }

    public function store(array $data): Komik
    {
        return Komik::create($data);
    }

    public function show(int|string $id): Komik
    {
        return Komik::with('kategori')->findOrFail($id);
    }

    public function update(int|string $id, array $data): Komik
    {
        $komik = Komik::findOrFail($id);
        $komik->update($data);
        return $komik->fresh();
    }

    public function destroy(int|string $id): void
    {
        Komik::findOrFail($id)->delete();
    }
}
