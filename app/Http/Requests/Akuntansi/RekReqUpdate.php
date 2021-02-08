<?php

namespace App\Http\Requests\Akuntansi;

use Illuminate\Foundation\Http\FormRequest;

class RekReqUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolfalse
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
            'bank' => 'required',
            'no_rekening' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'bank.required' => 'bank tidak boleh kosong!!',
            'no_rekening.required' => 'nomor rekening tidak boleh kosong!!',
            'status.required' => 'status tidak boleh kosong!!'
        ];
    }
}
