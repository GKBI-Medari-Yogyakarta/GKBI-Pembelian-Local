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
            'no_agenda_pembelian' => 'required',
            'no_agenda_gudang' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'no_agenda_pembelian.required' => 'nomor agenda pembelian tidak boleh kosong!!',
            'no_agenda_gudang.required' => 'nomor agenda gudang tidak boleh kosong!!',
        ];
    }
}
