<?php

namespace App\Http\Controllers\Akuntansi\Payment;

use App\Http\Controllers\Controller;
use App\Model\Akuntansi\Payment;
use Yajra\DataTables\Contracts\DataTable;

class HistoryDatatable extends Controller
{
    public function __invoke()
    {
        return DataTable::of(Payment::all())->make(\true);
    }
}
