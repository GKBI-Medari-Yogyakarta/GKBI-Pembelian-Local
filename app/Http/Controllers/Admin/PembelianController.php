<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPembelianRequest;
use App\Model\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PembelianController extends Controller
{
    //to index
    public function index()
    {
        $user = Pembelian::query()->get();
        return \view('admin.user-pembelian.index', \compact('user'));
    }
    //to form create / make
    public function create()
    {
        return \view('admin.user-pembelian.create');
    }
    //save / store data
    public function store(UserPembelianRequest $req)
    {
        Pembelian::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        return \redirect()->route('admin-pembelian.index')->with(['msg' => "Berhasil menambah user $req->name"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('admin-pembelian.index');
    }
    //to form edit
    public function edit($id)
    {
        $user = Pembelian::findOrFail($id);
        return \view('admin.user-pembelian.edit', \compact('user'));
    }
    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = Pembelian::findOrFail($id);
        $user->name = $req->name;
        $user->email = $user->email;
        if (empty($req->password)) {
            $user->password = $user->password;
        }
        $user->password = $req->password;
        $user->save();
        return \redirect()->route('admin-pembelian.index')->with(['msg' => "Berhasil merubah data user $req->name"]);
    }
    //delete
    public function destroy($id)
    {
        $user = Pembelian::findOrFail($id);
        $user->delete();
        return \redirect()->route('admin-pembelian.index')->with(['msg' => "Data user $user->name berhasil di hapus!!"]);
    }
}
