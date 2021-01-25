<?php

namespace App\Http\Requests\Pemesan;

use Illuminate\Foundation\Http\FormRequest;

class PesananRequest extends FormRequest
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
            'pemesan' => 'required',
            'no_pemesan' => 'required',
            'tgl_pesanan' => 'required|date',
            'nm_barang' => 'required',
            'spesifikasi' => 'required',
            'unit_stok' => 'required',
            // 'gudang_stok' => 'required',
            'jumlah'=>'required',
            'tgl_diperlukan' => 'required|date',
            'bagian_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'pemesan.required' => 'nama pemesan wajib diisi!!',
            'no_pemesan.required' => 'nomor surat wajib diisi!!',
            'tgl_pesanan.required' => 'tanggal pengajuan permintaan wajib diisi!!',
            'nm_barang.required' => 'nama barang tidak boleh kosong!!',
            'spesifikasi.required' => 'spesifikasi barang tidak boleh kosong!!',
            'unit_stok.required' => 'wajib mencantumkan stok unit!!',
            // 'gudang_stok.required' => 'wajib mencantumkan stok gudang!!',
            'jumlah.required'=>'kolom jumlah tidak boleh kosong!!',
            'tgl_diperlukan.required' => 'tanggal diperlukan wajib diisi!!',
            'bagian_id.required' => 'bagian/unit yang memesan wajib dicantumkan!!',
        ];
    }
}
