<?php

namespace App\Model\Gudang\Stok;

use App\Model\Gudang\GudangStok;
use Illuminate\Database\Eloquent\Model;

class TemporaryStock extends Model
{
    protected $fillable = ['item_id', 'gs_id', 'kd_barang', 'jumlah_stok', 'stok_masuk', 'bagian_id'];
    public $timestamp = \true;
    public function item()
    {
        return $this->belongsTo(GudangStok::class, 'id');
    }
}
