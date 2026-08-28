<?php
namespace App\Services;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Collection;

class AnggotaService
{
    public function index(): Collection
    {
        return Anggota::all();
    }

    public function store(array $data): Anggota
    {
        return Anggota::create($data);
    }

    public function show(int|string $id): Anggota
    {
        return Anggota::findOrFail($id);
    }

    public function update(int|string $id, array $data): Anggota
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($data);
        return $anggota->fresh();
    }

    public function destroy(int|string $id): void
    {
        Anggota::findOrFail($id)->delete();
    }
}
