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
    public function index() {
        if (Auth::check()) {
            $user = Gudang::query()->get();
            return \view('admin.user-gudang.index', \compact('user'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form create / make
    public function create() {
        if (Auth::check()) {
            return \view('admin.user-gudang.create');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //save / store data
    public function store(UserGudangRequest $req) {
        if (Auth::check()) {
            Gudang::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ]);
            return \redirect()->route('admin-gudang.index')->with(['msg' => "Berhasil menambah user $req->name"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show() {
        if (Auth::check()) {
            return \redirect()->route('admin-gudang.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit($id) {
        if (Auth::check()) {
            $user = Gudang::find($id);
            return \view('admin.user-gudang.edit', \compact('user'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //update
    public function update(Request $req, $id) {
        if (Auth::check()) {
            $this->validate($req, [
                'name' => 'required',
                'email' => 'required',
            ]);
            $user = Gudang::find($id);
            $user->name = $req->name;
            $user->email = $req->email;
            if (empty($req->password)) {
                $user->password = $user->password;
            }
            $user->password = Hash::make($req->password);
            $user->save();
            return \redirect()->route('admin-gudang.index')->with(['msg' => "Berhasil merubah data user $user->name"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete
    public function destroy($id) {
        if (Auth::check()) {
            $user = Gudang::find($id);
            $user->delete();
            return \redirect()->back()->with(['msg' => "Data user $user->name berhasil di hapus!!"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
