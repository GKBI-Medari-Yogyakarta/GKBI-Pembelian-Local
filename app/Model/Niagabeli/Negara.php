<?php

namespace App\Model\Niagabeli;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $fillable = ['nama','kode'];
    public $timestamps = \true;
}
