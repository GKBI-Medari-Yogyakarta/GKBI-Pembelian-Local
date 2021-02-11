<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPemesanRequest extends FormRequest
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
            'name' => 'required|unique:pemesans',
            'email' => 'required|email|unique:pemesans',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'kolom nama kosong atau sudah ada.',
            'email.required' => 'kolom email kosong atau sudah ada.',
            'password.required' => 'kolom password tidak boleh kosong.',
        ];
    }
}
