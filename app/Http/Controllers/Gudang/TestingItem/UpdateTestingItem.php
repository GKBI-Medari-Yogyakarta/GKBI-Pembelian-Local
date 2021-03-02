<?php

namespace App\Http\Controllers\Gudang\TestingItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gudang\TestingItemRequest;
use App\Model\Gudang\TestingItem;
use Illuminate\Http\Request;

class UpdateTestingItem extends Controller
{
    public function __invoke(TestingItemRequest $req, $id)
    {
        $testing_item = TestingItem::find($id);
        $testing_item->no_test = $req->no_test;
        $testing_item->tgl_ = $req->tgl_;
        $testing_item->save();
        return redirect()->route('test.index')->with(['msg' => "Berhasil memperbaharui detail pengecekan barang dengan nomor test $testing_item->no_test"]);
    }
}
