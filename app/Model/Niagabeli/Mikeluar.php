<?php

namespace App\Model\Niagabeli;

use App\Model\Gudang\TestingItem;
use Illuminate\Database\Eloquent\Model;

class Mikeluar extends Model
{
    protected $fillable = ['ti_id', 'status_deputi', 'no_mikeluar'];
    public $timestamps = \true;
    public function testingItem()
    {
        return $this->belongsTo(TestingItem::class, 'ti_id');
    }
}
