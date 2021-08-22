<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TakeRequest extends FormRequest
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
            'no_siswa' => 'required|max:255',
            'nama' => 'required|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'status' => 'nullable|string|in:PROCESS,RECEIVED,ONGOING,LATE',
            'transaction_details' => 'required|array',
            'transaction_details.*' => 'integer|exist:books,id'
        ];
    }
}
