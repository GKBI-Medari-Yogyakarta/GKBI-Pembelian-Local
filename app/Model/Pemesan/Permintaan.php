<?php

namespace App\Model\Pemesan;

use App\Model\Bagian;
use App\Model\Niagabeli\Transaction;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $fillable = ['pemesan', 'no_pemesan', 'tgl_pesanan', 'nm_barang', 'spesifikasi', 'unit_stok', 'gudang_stok', 'jumlah', 'tgl_diperlukan', 'realisasi', 'status_direktur', 'status_permintaan', 'bagian_id', 'ttd_pemesan', 'ttd_ka_unit', 'ttd_direktur', 'ttd_niaga_pembelian', 'user_pemesan_id', 'status_ka_bpemesan', 'status_ka_unit', 'kd_barang'];
    public $timestamps = \true;
    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
