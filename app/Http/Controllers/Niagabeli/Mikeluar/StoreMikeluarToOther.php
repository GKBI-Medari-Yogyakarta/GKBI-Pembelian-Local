<?php

namespace App\Http\Controllers\Niagabeli\Mikeluar;

use App\Http\Controllers\Controller;
use App\Model\Gudang\BarangDatang;
use App\Model\Gudang\TestingItem;
use App\Model\Niagabeli\IjinKeluar;
use App\Model\Niagabeli\Mikeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreMikeluarToOther extends Controller
{
    public function __invoke(Request $req, $id)
    {
        $mikeluar = Mikeluar::findOrFail($id);
        $ti = TestingItem::where('id', $mikeluar->ti_id)->first();
        $bd = BarangDatang::where('id', $ti->bd_id)->first();
        if ($req->input('action') == 'Ya') {
            DB::beginTransaction();
            try {
                $mikeluar->status_deputi = '1';
                $mikeluar->save();
                IjinKeluar::create([
                    'mikeluar_id' => $mikeluar->id,
                ]);
                DB::commit();
                return \redirect()->back()->with(['msg' => 'Pengembalian barang disetujui oleh deputi!!']);
            } catch (\Exception $e) {
                DB::rollBack();
                return \redirect()->back()->with(['warning' => 'something went wrong!!']);
            }
        } elseif ($req->input('action') == 'Tidak') {
            DB::beginTransaction();
            try {
                $mikeluar->status_deputi = '0';
                $mikeluar->save();
                BarangDatang::create([
                    's_jln_id' => $bd->s_jln_id,
                    'no_agenda_pembelian' => $bd->no_agenda_pembelian,
                    'no_agenda_gudang' => $bd->no_agenda_gudang,
                    'mikeluar_id' => $mikeluar->id,
                ]);
                DB::commit();
                return \redirect()->back()->with(['msg' => 'Pengembalian barang tidak disetujui oleh deputi. silahkan lakukan pengecekan lagi!!']);
            } catch (\Exception $e) {
                DB::rollBack();
                return \redirect()->back()->with(['warning' => 'something went wrong!!']);
            }
        }
        return \redirect()->back()->with(['msg' => 'tidak ada aksi!!']);
    }
}
