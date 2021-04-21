<?php

namespace App\Http\Controllers\Niagabeli\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Model\Pembelian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePassword extends Controller
{
    public function __invoke(ChangePasswordRequest $req, Pembelian $pembelian)
    {
        $pembelian->name = $req->name;
        $pembelian->email = $req->email;
        $pembelian->password = Hash::make($req->password);
        $pembelian->save();
        Session::flush();
        Auth::logout();
        return \redirect()->route('login.index')->with(['msg' => 'Silahkan login kembali menggunakan nama dan password baru!!!']);
    }
}
