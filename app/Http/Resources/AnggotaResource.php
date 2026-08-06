<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnggotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $panjangNo = strlen($this->no_hp);
        $noHpTersamar = substr($this->no_hp, 0, 4) . str_repeat('*', $panjangNo - 7) . substr($this->no_hp, -3);

        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'no_hp' => $noHpTersamar,
            'alamat' => $this->alamat,
            'tanggal_daftar' => $this->tanggal_daftar,
            'bergabung_sejak' => $this->created_at->diffForHumans(), 
        ];
    }
}
