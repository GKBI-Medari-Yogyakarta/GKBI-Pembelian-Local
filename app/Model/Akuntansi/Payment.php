<?php

namespace App\Model\Akuntansi;

use App\Model\Gudang\NpbPrice;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['rek_id', 'payment_code', 'payment_type', 'keterangan', 'total', 'harga_per_item', 'saldo_awal', 'saldo_akhir', 'payment_date', 'us_id', 'payment_status'];
    public $timestamps = \true;
    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rek_id');
    }
    public function price()
    {
        return $this->belongsTo(NpbPrice::class, 'price_id');
    }
}
