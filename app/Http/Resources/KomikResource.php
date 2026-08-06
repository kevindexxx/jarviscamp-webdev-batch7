<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KomikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'kategori_id' => $this->kategori_id,
            'stok' => $this->stok,
            'status' => $this->status,
            'file_pdf' => $this->file_pdf ? asset('storage/' . $this->file_pdf) : null,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
