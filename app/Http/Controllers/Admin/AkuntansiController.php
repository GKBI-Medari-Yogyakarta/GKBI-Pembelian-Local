<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAkuntansiRequest;
use App\Model\Akuntansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkuntansiController extends Controller
{
    //to index
    public function index()
    {
        $user = Akuntansi::query()->get();
        return \view('admin.user-akuntansi.index', \compact('user'));
    }
    //to form create / make
    public function create()
    {
        return \view('admin.user-akuntansi.create');
    }
    //save / store data
    public function store(UserAkuntansiRequest $req)
    {
        Akuntansi::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        return \redirect()->route('admin-akuntansi.index')->with(['msg' => "Berhasil menambah user $req->name"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('admin-akuntansi.index');
    }
    //to form edit
    public function edit($id)
    {
        $user = Akuntansi::findOrFail($id);
        return \view('admin.user-akuntansi.edit', \compact('user'));
    }
    //update
    public function update(Request $req, $id)
    {

        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = Akuntansi::findOrFail($id);
        $user->name = $req->name;
        $user->email = $req->email;
        if (empty($req->password)) {
            $user->password = $user->password;
        }
        $user->password = Hash::make($req->password);
        $user->save();
        return \redirect()->route('admin-akuntansi.index')->with(['msg' => "Berhasil merubah data user $user->name"]);
    }
    //delete
    public function destroy($id)
    {

        $user = Akuntansi::findOrFail($id);
        $user->delete();
        return \redirect()->back()->with(['msg' => "Data user $user->name berhasil di hapus!!"]);
    }
}
