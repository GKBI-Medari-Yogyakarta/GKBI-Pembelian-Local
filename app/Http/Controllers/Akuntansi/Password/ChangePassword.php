<?php

namespace App\Http\Controllers\Akuntansi\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Model\Akuntansi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePassword extends Controller
{
    public function __invoke(ChangePasswordRequest $req, Akuntansi $akuntansi)
    {
        $akuntansi->name = $req->name;
        $akuntansi->email = $req->email;
        $akuntansi->password = Hash::make($req->password);
        $akuntansi->save();
        Session::flush();
        Auth::logout();
        return \redirect()->route('login.index')->with(['msg' => 'Silahkan login kembali menggunakan nama dan password baru!!!']);
    }
}
