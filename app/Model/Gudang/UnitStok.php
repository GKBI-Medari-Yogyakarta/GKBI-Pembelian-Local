<?php

namespace App\Model\Gudang;

use Illuminate\Database\Eloquent\Model;

class UnitStok extends Model
{
    protected $fillable = ['item_id', 'jumlah_stok', 'stok_masuk', 'bagian_id'];
    public $timestamp = \true;
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
