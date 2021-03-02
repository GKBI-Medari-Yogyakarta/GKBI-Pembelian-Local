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
        $testing_item->cek_detail = 1;
        $testing_item->save();
    }
}
