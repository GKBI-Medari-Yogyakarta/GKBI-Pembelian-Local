<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar\Ijin;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\IjinKeluar;
use Illuminate\Http\Request;

class EditIjinController extends Controller
{
    public function __invoke($id)
    {
        $ijin_keluar = IjinKeluar::find($id);
        return \view('niagabeli.mikeluar.surat-keluar.edit', \compact('ijin_keluar'));
    }
}
