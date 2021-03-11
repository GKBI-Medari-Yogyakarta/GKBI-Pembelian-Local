<?php

namespace App\Model\Gudang;

use App\Model\Niagabeli\Item;
use Illuminate\Database\Eloquent\Model;

class GudangStok extends Model
{
    protected $fillable = ['item_id', 'jumlah_stok', 'stok_masuk', 'bagian_id'];
    public $timestamp = \true;
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
