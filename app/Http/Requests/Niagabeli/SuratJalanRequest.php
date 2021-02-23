<?php

namespace App\Http\Requests\Niagabeli;

use Illuminate\Foundation\Http\FormRequest;

class SuratJalanRequest extends FormRequest
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
            'no_jalan' => 'required',
            'tgl_' => 'required',
            'spb_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'no_jalan.required' => 'nomor surat jalan tidak boleh kosong!!',
            'tgl_.required' => 'tanggal surat jalan tidak boleh kosong!!',
            'spb_id.required' => 'barang tidak boleh kosong!!',
        ];
    }
}
