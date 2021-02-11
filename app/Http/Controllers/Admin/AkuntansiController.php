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
    public function index() {
        if (Auth::check()) {
            $user = Akuntansi::query()->get();
            return \view('admin.user-akuntansi.index', \compact('user'));
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form create / make
    public function create() {
        if (Auth::check()) {
            return \view('admin.user-akuntansi.create');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //save / store data
    public function store(UserAkuntansiRequest $req) {
        if (Auth::check()) {
            Akuntansi::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ]);
            return \redirect()->route('admin-akuntansi.index')->with(['msg' => "Berhasil menambah user $req->name"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //nothing, just for completed of resources in routing
    public function show() {
        if (Auth::check()) {
            return \redirect()->route('admin-akuntansi.index');
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //to form edit
    public function edit($id) {
        if (Auth::check()) {
            $user = Akuntansi::find($id);
            return \view('admin.user-akuntansi.edit', \compact('user'));
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
            $user = Akuntansi::find($id);
            $user->name = $req->name;
            $user->email = $req->email;
            if (empty($req->password)) {
                $user->password = $user->password;
            }
            $user->password = Hash::make($req->password);
            $user->save();
            return \redirect()->route('admin-akuntansi.index')->with(['msg' => "Berhasil merubah data user $user->name"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
    //delete
    public function destroy($id) {
        if (Auth::check()) {
            $user = Akuntansi::find($id);
            $user->delete();
            return \redirect()->back()->with(['msg' => "Data user $user->name berhasil di hapus!!"]);
        } else {
            return \redirect()->route('login.index')->with(['msg' => 'anda harus login!!']);
        }
    }
}
