<?php

namespace App\Model\Gudang;

use Illuminate\Database\Eloquent\Model;

class NpbPrice extends Model
{
    protected  $fillable = ['qty_id', 'sesuai_sop'];
    public $timestamps = true;
    public function npbQty()
    {
        return $this->belongsTo(NpbQty::class, 'qty_id');
    }
}
