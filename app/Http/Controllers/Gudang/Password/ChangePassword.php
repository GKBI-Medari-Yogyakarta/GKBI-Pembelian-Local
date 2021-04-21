<?php

namespace App\Http\Controllers\Gudang\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Model\Gudang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePassword extends Controller
{
    public function __invoke(ChangePasswordRequest $req, Gudang $gudang)
    {
        $gudang->name = $req->name;
        $gudang->email = $req->email;
        $gudang->password = Hash::make($req->password);
        $gudang->save();
        Session::flush();
        Auth::logout();
        return \redirect()->route('login.index')->with(['msg' => 'Silahkan login kembali menggunakan nama dan password baru!!!']);
    }
}
