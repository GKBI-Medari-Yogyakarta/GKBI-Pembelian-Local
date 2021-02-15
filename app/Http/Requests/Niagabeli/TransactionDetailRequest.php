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
            'tgl_status.required' => 'kolom tanggal status tidak boleh kosong!!',
            'no_niaga.required' => 'kolom nomor tidak boleh kosong!!',
            'rencana_beli.required' => 'kolom rencana jumlah beli tidak boleh kosong!!',
            'payment_type.required' => 'kolom metode pembayaran tidak boleh kosong!!',
            'keterangan.required' => 'kolom keterangan tidak boleh kosong!!',
            'no_transaction.required' => 'nomor transaksi atau pembelian tidak boleh kosong!!',
        ];
    }
}
