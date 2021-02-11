<?php

namespace App\Http\Requests\Niagabeli;

use Illuminate\Foundation\Http\FormRequest;

class KabRequest extends FormRequest
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
            'prov_id' => 'required',
            'nama' => 'required|unique:kabupatens',
            'kota' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'prov_id.required' => 'Belum memiliki provinsi',
            'nama.required' => 'kolom nama kabupaten kosong atau sudah ada.',
            'kota.required' => 'kolom kota wajib diisi.',
        ];
    }
}
