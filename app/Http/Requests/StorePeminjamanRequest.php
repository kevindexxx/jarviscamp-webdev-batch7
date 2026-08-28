<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Wajib diubah menjadi true[cite: 1]
    }

    public function rules(): array
    {
        return [
            'anggota_id' => ['required', 'integer', 'exists:anggota,id'],
            'komik_id' => ['required', 'integer', 'exists:komiks,id'],
            'tanggal_pinjam' => ['required', 'date'],
        ];
    }
}
