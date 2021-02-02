<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['kab_id','nama','telp','fax','alamat','email','attn','npwp']
    public $timestamps = \true;
}
