<?php

namespace App\Http\Controllers\Pemesan\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Pemesan;

class ChangePassword extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ChangePasswordRequest $req, Pemesan $pemesan)
    {
        $pemesan->name = $req->name;
        $pemesan->email = $req->email;
        $pemesan->password = Hash::make($req->password);
        $pemesan->save();
        Session::flush();
        Auth::logout();
        return \redirect()->route('login.index')->with(['msg'=> 'Silahkan login kembali menggunakan nama dan password baru!!!']);
    }
}
