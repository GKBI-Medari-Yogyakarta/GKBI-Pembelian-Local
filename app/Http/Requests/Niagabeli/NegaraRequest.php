<?php

namespace App\Http\Requests\Niagabeli;

use Illuminate\Foundation\Http\FormRequest;

class NegaraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|unique:negaras',
            'kode' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'kolom nama negara kosong atau sudah ada.',
            'kode.required' => 'kolom kode wajib diisi.',
        ];
    }
}
