<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BagianReqUpdate extends FormRequest
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
            'no_identitas' => 'required',
            'unit_id' => 'required',
            'nama' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'no_identitas.required' => 'masukkan nomor identitas bagian, tidak boleh kosong!!',
            'unit_id.required' => 'bagian harus memiliki unit!!',
            'nama.required' => 'nama tidak boleh kosong!!',
        ];
    }
}
