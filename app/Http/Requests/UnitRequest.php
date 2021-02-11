<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'nama' => 'required|unique:units',
            'alias' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama unit sudah ada atau kolom unit kosong!!',
            'alias.required' => 'Kolom alias tidak boleh kosong',
        ];
    }
}
