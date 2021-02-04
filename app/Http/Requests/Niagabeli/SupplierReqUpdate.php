<?php

namespace App\Http\Requests\Niagabeli;

use Illuminate\Foundation\Http\FormRequest;

class SupplierReqUpdate extends FormRequest
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
            'kab_id' => 'required',
            'nama' => 'required',
            'telp' => 'required|numeric|min:11',
            'fax' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'attn' => 'required',
            'npwp' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'kab_id.required' => 'kolom kabupaten tidak boleh kosong',
            'nama.required' => 'kolom nama provinsi tidak boleh kosong.',
            'telp.required|numeric' => 'kolom telp tidak boleh kosong dan harus angka.',
            'fax.required' => 'kolom fax tidak boleh kosong',
            'alamat.required' => 'kolom detail alamat tidak boleh kosong',
            'email.required' => 'kolom email tidak boleh kosong',
            'attn.required' => 'kolom attn tidak boleh kosong',
            'npwp.required' => 'kolom npwp tidak boleh kosong',
        ];
    }
}
