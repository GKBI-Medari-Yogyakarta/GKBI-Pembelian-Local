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
            'sup_id' => 'required',
            'nota_spb' => 'required',
            'jadwal_datang' => 'required',
            'tempo_pembayaran' => 'required',
            'satuan' => 'required',
        ];
    }
    public function messages()
    {
        return [
            '_terbeli.required' => 'jumlah terbeli tidak boleh kosong!!',
            '_terbayar.required' => 'jumlah terbayar tidak boleh kosong!!',
            'tgl_beli.required' => 'tanggal pembelian tidak boleh kosong!!',
            'sup_id.required' => 'kolom supplier tidak boleh kosong!!',
            'nota_spb.required' => 'nota surat penerimaan barang tidak boleh kosong!!',
            'jadwal_datang.required' => 'jadwal datang pembelian tidak boleh kosong!!',
            'tempo_pembayaran.required' => 'waktu tempo pembayaran tidak boleh kosong!!',
            'satuan.required' => 'kolom satuan tidak boleh kosong!!',
        ];
    }
}
