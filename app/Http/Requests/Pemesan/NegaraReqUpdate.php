<?php

namespace App\Http\Requests\Pemesan;

use Illuminate\Foundation\Http\FormRequest;

class NegaraReqUpdate extends FormRequest
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
            'nama' => 'required',
            'kode' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'kolom nama negara tidak boleh kosong.',
            'kode.required' => 'kolom kode tidak boleh kosong.',
        ];
    }
}
