<?php

namespace App\Http\Requests\Niagabeli;

use Illuminate\Foundation\Http\FormRequest;

class TransactionDetailRequest extends FormRequest
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
            '_terbeli' => 'required',
            '_terbayar' => 'required',
            'tgl_beli' => 'required',
        ];
    }
    public function messages()
    {
        return [
            '_terbeli.required' => 'jumlah terbeli tidak boleh kosong!!',
            '_terbayar.required' => 'jumlah terbayar tidak boleh kosong!!',
            'tgl_beli.required' => 'tanggal beli tidak boleh kosong!!',
        ];
    }
}
