<?php

namespace App\Model\Niagabeli;

use App\Model\Gudang\NpbQty;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['barang_id', 'nm_barang', 'spek_barang', 'ket_barang', 'kd_barang', 'ppn_barang', 'hrg_barang', 'jml_barang', 'barang_masuk', 'barang_keluar', 'npb_id'];
    public $timestamps = true;
    public function qty()
    {
        return $this->belongsTo(NpbQty::class, 'npb_id');
    }
}
