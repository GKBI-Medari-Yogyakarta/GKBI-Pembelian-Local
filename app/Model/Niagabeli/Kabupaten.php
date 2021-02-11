<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $fillable = ['prov_id', 'nama', 'kota'];
    public $timestamps = \true;
}
