<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKomikRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'sometimes|required|string|max:255',
            'penulis' => 'sometimes|required|string|max:255',
            'kategori_id' => 'sometimes|required|exists:kategori,id',
            'stok' => 'sometimes|required|integer|min:0',
            'status' => 'sometimes|in:available,unavailable',
            'file_pdf' => 'nullable|file|mimes:pdf|max:5120'
        ];
    }
}
