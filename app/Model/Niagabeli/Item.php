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
    // public function test()
    // {
    //     // SELECT * FROM `items` WHERE created_at in (SELECT MAX(created_at) as ca FROM items WHERE kd_barang LIKE 'A3')

    //     $test = Item::where(function ($query) {
    //         $query->select('MAX(created_at) as create_date')
    //             ->from('items')
    //             ->where('kd_barang')
    //             ->orderByDesc('membership.start_date')
    //             ->limit(1);
    //     }, 'Pro')->get();
    // }
}
