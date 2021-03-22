<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPemesanRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\Pemesan;

class PemesanController extends Controller
{
    //to index
    public function index()
    {
        $user = Pemesan::query()->get();
        return \view('admin.user-pemesan.index', \compact('user'));
    }
    //to form create / make
    public function create()
    {
        return \view('admin.user-pemesan.create');
    }
    //save / store data
    public function store(UserPemesanRequest $req)
    {
        Pemesan::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        return \redirect()->route('admin-pemesan.index')->with(['msg' => "Berhasil menambah user $req->name"]);
    }
    //nothing, just for completed of resources in routing
    public function show()
    {
        return \redirect()->route('admin-pemesan.index');
    }
    //to form edit
    public function edit($id)
    {
        $user = Pemesan::findOrFail($id);
        // \dd($user);
        return \view('admin.user-pemesan.edit', \compact('user'));
    }
    //update
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $user = Pemesan::findOrFail($id);
        $user->name = $req->name;
        $user->email = $req->email;
        if (empty($req->password)) {
            $user->password = $user->password;
        }
        $user->password = Hash::make($req->password);
        $user->save();
        return \redirect()->route('admin-pemesan.index')->with(['msg' => "Berhasil merubah data user $user->name"]);
    }
    //delete
    public function destroy($id)
    {
        $user = Pemesan::findOrFail($id);
        $user->delete();
        return \redirect()->back()->with(['msg' => "Data user $user->name berhasil di hapus!!"]);
    }
}
