<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar;

use App\Http\Controllers\Controller;
use App\Model\Gudang\TestingItem;
use App\Model\Niagabeli\Mikeluar;
use Illuminate\Http\Request;

class EditMikeluar extends Controller
{
    public function __invoke($id)
    {
        $mikeluar = Mikeluar::find($id);
        $ti = TestingItem::where('id', $mikeluar->ti_id)->first();
        return \view('niagabeli.mikeluar.edit', \compact('mikeluar', 'ti'));
    }
}
