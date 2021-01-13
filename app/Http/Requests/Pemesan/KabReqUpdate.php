<?php

namespace App\Http\Requests\Pemesan;

use Illuminate\Foundation\Http\FormRequest;

class KabReqUpdate extends FormRequest
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
            'nama' => 'required',
            'kota' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'prov_id.required' => 'Provinsi tidak boleh kosong',
            'nama.required' => 'kolom nama kabupaten tidak boleh kosong.',
            'kota.required' => 'kolom kota tidak boleh kosong.',
        ];
    }
}
