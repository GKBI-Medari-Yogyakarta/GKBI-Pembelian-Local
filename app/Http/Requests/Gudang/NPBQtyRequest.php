<?php

namespace App\Http\Requests\Gudang;

use Illuminate\Foundation\Http\FormRequest;

class NPBQtyRequest extends FormRequest
{
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
            'no_urut' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'no_urut.required' => 'Nomor urut tidak boleh kosong',
        ];
    }
}
