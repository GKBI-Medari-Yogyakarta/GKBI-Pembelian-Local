<?php

namespace App\Http\Requests\Akuntansi;

use Illuminate\Foundation\Http\FormRequest;

class RekRequest extends FormRequest
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
            'bank' => 'required',
            'no_rekening' => 'required|unique:rekenings',
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
