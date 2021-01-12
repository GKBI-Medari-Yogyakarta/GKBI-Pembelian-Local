<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $fillable = ['no_identitas', 'unit_id', 'nama'];
    public $timestamps = \true;
}
