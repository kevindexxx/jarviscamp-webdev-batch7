<?php
namespace App\Services;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Collection;

class KategoriService
{
    public function index(): Collection
    {
        return Kategori::all();
    }

    public function store(array $data): Kategori
    {
        return Kategori::create($data);
    }

    public function show(int|string $id): Kategori
    {
        return Kategori::findOrFail($id);
    }

    public function update(int|string $id, array $data): Kategori
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);
        return $kategori->fresh();
    }

    public function destroy(int|string $id): void
    {
        Kategori::findOrFail($id)->delete();
    }
}
