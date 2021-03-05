<?php

namespace App\Model\Gudang;

use Illuminate\Database\Eloquent\Model;

class NpbQty extends Model
{
    protected $fillable = ['ti_id', 'no_urut', 'posting'];
    public $timestamps = true;
    public function testingItem()
    {
        return $this->belongsTo(TestingItem::class, 'ti_id');
    }
}
