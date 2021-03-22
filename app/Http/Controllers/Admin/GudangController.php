<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserGudangRequest;
use App\Model\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GudangController extends Controller
{
    //to index
    public function index()
    {
        $user = Gudang::query()->get();
        return \view('admin.user-gudang.index', \compact('user'));
    }
    //to form create / make
    public function create()
    {
        return \view('admin.user-gudang.create');
    }
    //save / store data
    public function store(UserGudangRequest $req)
    {
        Gudang::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        return \redirect()->route('admin-gudang.index')->with(['msg' => "Berhasil menambah user $req->name"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('admin-gudang.index');
    }
    //to form edit
    public function edit($id)
    {
        $user = Gudang::findOrFail($id);
        return \view('admin.user-gudang.edit', \compact('user'));
    }
    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = Gudang::findOrFail($id);
        $user->name = $req->name;
        $user->email = $req->email;
        if (empty($req->password)) {
            $user->password = $user->password;
        }
        $user->password = Hash::make($req->password);
        $user->save();
        return \redirect()->route('admin-gudang.index')->with(['msg' => "Berhasil merubah data user $user->name"]);
    }
    //delete
    public function destroy($id)
    {
        $user = Gudang::findOrFail($id);
        $user->delete();
        return \redirect()->back()->with(['msg' => "Data user $user->name berhasil di hapus!!"]);
    }
}
