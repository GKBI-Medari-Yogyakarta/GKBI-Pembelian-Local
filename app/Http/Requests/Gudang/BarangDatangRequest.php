<?php

namespace App\Http\Requests\Gudang;

use Illuminate\Foundation\Http\FormRequest;

class BarangDatangRequest extends FormRequest
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
            'no_jalan' => 'required',
            'tgl_' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'no_jalan.required' => 'nomor surat jalan tidak boleh kosong!!',
            'tgl_.required' => 'tanggal surat jalan tidak boleh kosong!!',
        ];
    }
}
