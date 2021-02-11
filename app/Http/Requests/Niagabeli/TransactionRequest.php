<?php

namespace App\Http\Requests\Niagabeli;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'permintaan_id' => 'required',
            'tgl_status' => 'required',
            'no_niaga' => 'required',
            'rencana_beli' => 'required',
            'payment_type' => 'required',
            'keterangan' => 'required',
            'no_transaction' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'permintaan_id.required' => 'kolom permintaan tidak boleh kosong!!',
            'tgl_status.required' => 'kolom tanggal status tidak boleh kosong!!',
            'no_niaga.required' => 'kolom nomor tidak boleh kosong!!',
            'rencana_beli.required' => 'kolom rencana jumlah beli tidak boleh kosong!!',
            'payment_type.required' => 'kolom metode pembayaran tidak boleh kosong!!',
            'keterangan.required' => 'kolom keterangan tidak boleh kosong!!',
            'no_transaction.required' => 'nomor transaksi atau pembelian tidak boleh kosong!!',
        ];
    }
}
