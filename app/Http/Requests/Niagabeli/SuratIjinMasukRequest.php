<?php

namespace App\Http\Requests\Niagabeli;

use Illuminate\Foundation\Http\FormRequest;

class SuratIjinMasukRequest extends FormRequest
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
            'no_ijin' => 'required',
            'tgl_' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'no_ijin.required' => 'nomor surat ijin masuk tidak boleh kosong!!',
            'tgl_.required' => 'tanggal surat ijin masuk tidak boleh kosong!!',
        ];
    }
}
