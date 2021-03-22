<?php

namespace App\Http\Controllers\Pemesan\FromStock;

use App\Http\Controllers\Controller;
use App\Model\Niagabeli\Item;
use Illuminate\Http\Request;

class IndexStock extends Controller
{
    public function __invoke(Request $req)
    {
        $item = Item::when($req->keyword, function ($query) use ($req) {
            $query->where('nm_barang', 'like', "%{$req->keyword}%")
                ->orwhere('kd_barang', 'like', "%{$req->keyword}%")
                ->orderBy('id', 'ASC');
        })->paginate($req->limit ??  10);
        $item->appends($req->only('keyword', 'limit'));
        return \view('pemesan.permintaan.daftar-barang.index', \compact('item'));
    }
}
