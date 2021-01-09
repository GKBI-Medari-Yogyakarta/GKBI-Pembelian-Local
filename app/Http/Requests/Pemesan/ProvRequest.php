<?php

namespace App\Http\Requests\Pemesan;

use Illuminate\Foundation\Http\FormRequest;

class ProvRequest extends FormRequest
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
            'negara_id' => 'required',
            'nama' => 'required|unique:provinsis',
            'alias' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'negara_id.required' => 'Belum memiliki negara',
            'nama.required' => 'kolom nama provinsi kosong atau sudah ada.',
            'alias.required' => 'kolom alias wajib diisi.',
        ];
    }
}
