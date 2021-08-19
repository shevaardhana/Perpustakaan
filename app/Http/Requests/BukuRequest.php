<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul' => 'required|max:255',
            'photo' => 'required|image',
            'deskripsi' => 'required',
            'kategori_id' => 'required|integer|exists:kategori,id',
            'tanggal_terbit' => 'required|date',
            'stock' => 'required|integer',
        ];
    }
}
