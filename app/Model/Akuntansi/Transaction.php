<?php

namespace App\Model\Akuntansi;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = ['rek_id', 'kd_transaction', 'jenis_transaction', 'keterangan', 'total', 'harga_per_item', 'saldo_awal', 'saldo_akhir', 'tgl_transaction'];
    public $timestamps = \true;
    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rek_id');
    }
}
