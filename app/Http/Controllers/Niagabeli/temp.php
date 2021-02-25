if (Auth::guard('pembelian')->check()) {
            $user_pembelian_id = Auth::guard('pembelian')->user()->getAuthIdentifier();
            $sj = SuratJalan::findOrFail($id);
            DB::beginTransaction();
            $suratIjinMasuk = SuratIjinMasuk::where('s_jln_id', $sj->id)->first();
            $barangDatang = BarangDatang::where('s_jln_id', $sj->id)->first();
            if (!isset($suratIjinMasuk->s_jln_id) && !isset($barangDatang->s_jln_id)) {
                $sj->update([
                    'no_jalan' => $req->no_jalan,
                    'tgl_' => $req->tgl_,
                    'arsip' => $req->arsip,
                    'user_id' => $user_pembelian_id,
                ]);
                DB::commit();
                return redirect()->route('jalan.index')->with(['msg' => "Berhasil mengubah surat jalan, dengan nomor $req->no_jalan"]);
            } else {
                try {
                    $sj->update([
                        'no_jalan' => $req->no_jalan,
                        'tgl_' => $req->tgl_,
                        'arsip' => $req->arsip,
                        'user_id' => $user_pembelian_id,
                    ]);
                    SuratIjinMasuk::create([
                        's_jln_id' => $sj->id,
                        'user_id' => $user_pembelian_id,
                    ]);
                    BarangDatang::create([
                        's_jln_id' => $sj->id,
                    ]);
                    DB::commit();
                    return redirect()->route('jalan.index')->with(['msg' => "Berhasil mengubah surat jalan, dengan nomor $req->no_jalan"]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->back()
                        ->with('warning', 'Something Went Wrong!, tidak berhasil merubah data!!');
                }
            }
        } else {
            return redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
